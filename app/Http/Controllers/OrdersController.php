<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Mollie\Api\Exceptions\ApiException;

use Cookie;
use Carbon\Carbon;
use Validator;
use Auth;
use Mail;
use PDF;
use GuzzleHttp\Client;
use Srmklive\PayPal\Services\ExpressCheckout;
//Models
use App\Models\Cart;
use App\Models\Coupoun;
use App\Models\Coupoun_User;
use App\Models\ShippingCost;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\User;
use App\Models\Payment_Method;
use App\Models\Invoice;
//Mails
use App\Mail\OrderSignupPassword;
use App\Mail\BankTransferMail;
use App\Mail\NewOrderMail;
use App\Mail\OrderInvoiceMail;
use App\Mail\OrderReceiptMail;
use App\Mail\OrderFailedMail;
use App\Mail\OrderStatusUpdateMail;
class OrdersController extends Controller{
  public function getCheckoutPage(){
    //***************** Get Cart Items
    //1- Get the user data
    $UserId = getUserId();
    //2- Get the cart items
    $CartItems = Cart::where('user_id' , $UserId)->where('status','active')->whereDate('created_at' , Carbon::today())->get();
    if($CartItems->count() == 0){
      return redirect()->route('product.home')->withError(__('controllers.orders_no_items'));
    }
    //Generate the total price without a tax
    $CartSubTotalArray = $CartItems->map(function($item) {
        return ($item->Product->final_price * $item->qty);
    });
    //Generate the total tax
    $Total = $CartSubTotalArray->sum();
    //Check id there is a coupon code applied
    $CouponDiscount = null;
    if(isset($CartItems->first()->applied_coupon)){//There is an applied coupon
        $CouponData = explode('-',$CartItems->first()->coupon_amount );
        if($CouponData[1] == 'fixed'){
            $CouponDiscount = $CouponData[0];
        }elseif($CouponData[1] == 'percent'){
            $CouponDiscount = ($Total * $CouponData[0]) / 100;
        }else{
            $CouponDiscount = $CouponData[0];
        }
    }
    $SubTotal = $CartSubTotalArray->sum() + getShippingValue($Total) - $CouponDiscount;
    $ShippingCostCountries = ShippingCost::pluck('country_name')->unique();
    $WeightArray = $CartItems->map(function($item){
      return ($item->Product->weight * $item->qty);
    });
    $OrderWeight = $WeightArray->sum();
    $CartTaxArray =  $CartItems->map(function($item){
      return ($item->Product->tax_rate);
    });
    $CartTaxAvg = $CartTaxArray->avg();
    return view('orders.checkout.checkout' , compact('CartItems','Total','ShippingCostCountries' ,'OrderWeight','CartTaxAvg','SubTotal','CouponDiscount'));
  }
  public function postOrder(Request $r){
    //Validate the Request
    $Rules = [
      'first_name' =>'required',
      'last_name' => 'required',
      'email' => 'email',
      'phone_number' => 'required',
      'address' =>'required',
      'house_number' =>'required',
      'city' => 'required',
      'zip_code' => 'required',
      'accepted_toc' => 'required',
      'order_weight' => 'required',
      'total_amount' => 'required',
      'total_shipping_cost' => 'required',
      'payment_method' => 'required'
    ];
    $validator = Validator::make($r->all() , $Rules);
    if($validator->fails()){
      return back()->withErrors($validator->errors()->all());
    }else{
      $UserId = getUserId();
      //Check if there is any old orders related to this user
      $OldOrders = Order::where('user_id' , $UserId)->where('status' , 'Pre-Payments')->first();
      if($OldOrders){
        //Delete the Old Order
        $OldOrders->delete();
      }
      //Update Cart Items to the new Owner ID
      $CartItems = Cart::where('user_id' , $UserId)->where('status' , 'active')->whereDate('created_at' , Carbon::today())->get();
      $CartItems->map(function($Item) {
        $Item->update(['user_id' => getUserId()]);
      });
      //Create the Order
      $OrderData = $r->except(['_token' , 'accepted_toc' , 'type']);
      if($r->has('vat_number') && $r->vat_number != null && $r->vat_number != ''){
        //Validate VAT Number
        $HttpClient = new Client();
        $response = @$HttpClient->get('http://apilayer.net/api/validate?access_key=9fd9f0afc73edf63a9c38f9d9cead84a&vat_number='.$r->vat_number);
        if($response->getStatusCode() != 200){
          $OrderData['is_vat_valid'] = 'no';
        }else{
          $ResponseAsArray = json_decode($response->getBody(), true);
          if($ResponseAsArray['valid']){
            $OrderData['is_vat_valid'] = 'yes';
          }
        }
      }else{
        $OrderData['vat_number'] = 'N/A';
        $OrderData['is_vat_valid'] = 'N/A';
      }
      $TheCodeNumber = "20200".str_replace('.' ,'', microtime(true).rand(1,9));
      $OrderData['serial_number'] = wordwrap($TheCodeNumber,5,'-',true);
      if(strlen($OrderData['serial_number']) != 23){
        $OrderData['serial_number'] = $OrderData['serial_number'].rand(pow(10, (23 - strlen($OrderData['serial_number']))-1), pow(10, (23 - strlen($OrderData['serial_number'])))-1);;
      }
      $OrderData['status'] = 'Pre-Payments';
      $OrderData['user_id'] = $UserId;
      $TheNewOrder = Order::create($OrderData);
      //Add the Cart Items to the table
      //2- Get the cart items
      $CartItems = Cart::where('user_id' , $UserId)->where('status','active')->whereDate('created_at' , Carbon::today())->get();
      //Generate the total price without a tax
      $CartSubTotalArray = $CartItems->map(function($item) use($TheNewOrder) {
        //Decrease Cart Items Inventory
        $item->Product->update([
          'inventory' => ($item->Product->inventory - $item->qty),
        ]);
        //Add Cart Item to Order
        Order_Product::create([
          'order_id' => $TheNewOrder->id,
          'user_id' => $TheNewOrder->user_id,
          'product_id' => $item->product_id,
          'is_free_shipping' => false,
          'qty' => $item->qty
        ]);
      });
      // Mail::to('admin@broadshop.be')->send(New NewOrderMail);
      $TheNewOrder = Order::find($TheNewOrder->id); 
      if($TheNewOrder->AlreadyPaid()){
        return redirect()->route('home')->withErrors('This order already been paid');
      }
      //Normal Payment Here
      $ProductsListObject = Order_Product::where('order_id' , $TheNewOrder->id)->get();
      $ProductsListArray = $ProductsListObject->map(function($item){
        return "Title: ".$item->Product->title." | ID: ".$item->product_id." | Quantity: ".$item->qty;
      });
      $OrderFinalTotal = $TheNewOrder->final_total + getShippingValue($TheNewOrder->final_total);
      //Redirect to Payment Gateway
      try{
        $payment = Mollie::api()->payments->create([
          "amount" => [
              "currency" => "EUR",
              "value" => sprintf("%.2f",$OrderFinalTotal)
          ],
          "description" => "Broadshop Order #$TheNewOrder->serial_number",
          "locale" => "$TheNewOrder->lang"."_us",
          "method" => "$r->payment_method",
          "billingEmail" => "$TheNewOrder->email",
          "metadata" => [
              'customer_name' => $TheNewOrder->first_name .' '.$TheNewOrder->last_name,
              'customer_id' => 'cst_'.$r->user_id,
              'products_list' => $ProductsListArray
          ],
          "redirectUrl" => route('order.success' , ['id' => $TheNewOrder->id])
          ]);
      } catch(ApiException $ee){
        $StatusCode = $ee->getResponse()->getStatusCode();
        switch ($StatusCode) {
          case 401:
            return back()->withErrors("The Payments Server is Being Fixed, Please Try Again Later");
            break;
          case 422:
            return back()->withErrors("Proccess Failed, Try again using payment method");
            break;
          default:
            return back()->withErrors("Something Went Wrong, Please Try Again");
            break;
        }
      }
      //Update the order with mollie id and status
      $TheNewOrder->update([
        'payment_method' => $payment->method,
        'status' => 'Order received',
        'payment_id' => $payment->id,
        'is_paid' => $payment->status
      ]);
      // redirect customer to Mollie checkout page
      return redirect($payment->getCheckoutUrl(), 303);
    }
  }
  public function getSummaryPage($id){
    $TheOrder = Order::findOrFail($id);
    return view('orders.single' , compact('TheOrder'));
  }
  public function updateVatNumber(Request $r , $id){
    //Check if the Order is There
    $TheOrder = Order::findOrFail($id);
    if($TheOrder != null){
      //Checl User ID vs Order
      if($TheOrder->user_id == $r->user_id){
        //The Guy's Order m Looking Good
        $TheOrder->update([
          'vat_number' => $r->vat_number,
          'is_vat_valid' => $r->is_vat_valid
        ]);
        return response(__('controllers.orders_updated') , 200);
      }else{
        return response(__('controllers.orders_not_yours') , 403);
      }
    }else{
      return response(__('controllers.orders_not_found') , 404);
    }
  }
  public function orderSuccess(Request $r){
    if(auth()->check()){$UserId = auth()->user()->id;}else{$UserId = Cookie::get('guest_id');}
    //Get the Payment ID
    $TheOrder = Order::where('id',$r->id)->first();
    if($TheOrder){
      if($TheOrder->user_id == $UserId){
        $OrderItems = Order_Product::where('order_id' , $TheOrder->id)->get();
        $ThePayment = Mollie::api()->payments->get($TheOrder->payment_id);
        //Check the Payment Status
        $TheOrder->update(['is_paid' => $ThePayment->status]);
        $TheCart = Cart::where('user_id' , $TheOrder->user_id)->where('status' , 'active')->whereDate('created_at' , Carbon::today())->get();
        if($ThePayment->status == 'paid'){
            //Clear the cart
          $TheCart->map(function($item){
            $item->update(['status' => 'purchased']);
          });
          //Craft the Invoice
          $TheInvoice = Invoice::where('order_id' , $TheOrder->id)->first();
          if(!$TheInvoice){
              $TheInvoice = Invoice::create([
                  'order_id' => $TheOrder->id,
                  'user_id' => $TheOrder->user_id,
                  'customer_name' => $TheOrder->first_name . ' ' . $TheOrder->last_name,
                  'address' => $TheOrder->shipping_address,
                  'city' => $TheOrder->shipping_city,
                  'phone_number' => $TheOrder->phone_number,
                  'email' => $TheOrder->email,
                  'country' => $TheOrder->country,
                  'vat_number' => $TheOrder->vat_number,
                  'payment_method' => $TheOrder->payment_method,
                  'order_serial_number' => $TheOrder->serial_number,
                  'is_paid' => ($TheOrder->is_paid == 'paid') ? 1 : 0
              ]);
          }
          //Generate the PDF Invoice
          $EmailData = $TheOrder;
          $pdf = PDF::loadView('orders.download' , ['TheOrder' => $TheOrder , 'TheInvoice' => $TheInvoice]);
          if($TheOrder->email){
            Mail::to($TheOrder->email)->send(new OrderInvoiceMail($EmailData,$pdf->output()));
          }
        }else{
          $TheOrder->update(['status' => 'Waiting for payment']);
          //Add The Items Back to inventory
          $TheCart->map(function($item){
            $item->Product->update([
              'inventory' => ($item->Product->inventory - $item->qty),
            ]);
          });
          //Add The Coupon Back
          if(isset($TheCart->first()->applied_coupon)){
            $TheCoupon = Coupoun::where('coupoun_code' , $TheCart->first()->applied_coupon)->first();
            $TheCoupon->amount = $TheCoupon->amount + 1;
            $TheCoupon->save();
            //Delete The Usage Record
            Coupoun_User::where('user_id' , auth()->user()->id)->where('coupoun_id' , $TheCoupon->id)->delete();
          }
          if($TheOrder->email){
            // Mail::to($TheOrder->email)->send(new OrderFailedMail($TheOrder));
          }
        }
        return view('orders.checkout.thank-you' , compact('TheOrder' , 'OrderItems'));
      }else{
        $TheOrder->update(['status' => 'Wrong User']);
        abort(403);
      }
    }else{
      abort(404);
    }
  }

  //Admin Only Methods
  public function getHome(){
    $Orders = Order::latest()->get();
    return view('admin.orders.index' , compact('Orders'));
  }
  public function getSingleOrder($id){
    $TheOrder = Order::findOrFail($id);
    return view('admin.orders.single' , compact('TheOrder'));
  }
  public function updateOrderStatus(Request $r, $id){
    //Find The Order
    $TheOrder = Order::findOrFail($id);
    if($TheOrder){
        //Vlidate the Request
        $Rules = [
          'order_status' => 'required',
          'tracking_link' => 'nullable|url'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
          return back()->withErrors($validator->errors()->all());
        }else{
          //Updat the Order
          $TheOrder->update([
            'status' => $r->order_status,
            'tracking_link' => $r->tracking_link
          ]);
          //Send an Email to The User
          Mail::to($TheOrder->email)->send(new OrderStatusUpdateMail($TheOrder));
          return back()->withSuccess('Order Updated Successfully');
        }
    }else{
      return back()->withErrors('Order is Not Available');
    }
  }
}
