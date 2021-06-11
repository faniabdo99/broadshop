<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;
use Validator;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingCost;
class CartController extends Controller{
    public function addItem(Request $r){
        //Validate the request
        $Rules = [
            'product_id' => 'required',
            'user_id' => 'required',
            'qty' => 'required',
            'color' => 'required',
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return response('Please choose color and quantity' , 422);
        }else{
            $CartData = $r->all();
            //Check if the product viable
            $Product = Product::find($r->product_id);
            if(!$Product || $Product->inventory <= 0 || $Product->status == 'Sold Out' || $Product->status == 'Invisible'){
                return response('This product is not available for sale' , 404);
            }else{
                //Check the current cart
                $UserCart = Cart::where('user_id' , $CartData['user_id'])->where('product_id' , $r->product_id)->where('status','active')->whereDate('created_at' , Carbon::today())->first();
                if($UserCart){
                    if($UserCart->qty >= $Product->inventory){
                        return response('You can\'t order more than' .$Product->inventory  , 404);
                    }
                }
                if($Product->inventory < $r->qty){
                    return response('You can\'t order more than' .$Product->inventory  , 404);
                }
                $CartData['qty'] = ($r->qty ? $r->qty : 1);
                $CurrentCart = Cart::where('product_id' , $CartData['product_id'])->where('user_id' , $CartData['user_id'])->whereDate('created_at' , Carbon::today())->where('status' , 'active')->first();
                if($CurrentCart){
                    $CurrentCart->update(['qty' => $CurrentCart->qty + $CartData['qty']]);
                    return response('Your cart has been updated' , 200);
                }else{
                    $CartData['product_id'] = $Product->id;
                    Cart::create($CartData);
                    return response('Your cart has been updated' , 200);
                }
            }
        }
    }
    public function deleteItem($CartId , $UserId){
        $CartItem = Cart::where('id' , $CartId)->where('user_id' , $UserId)->where('status' , 'active')->whereDate('created_at' , Carbon::today())->first();
        if($CartItem){
            $CartItem->update([
                'status' => 'deleted'
            ]);
            return redirect()->route('cart')->withSuccess('Item deleted from your cart');
        }else{
            return redirect()->route('cart')->withErrors('You don\'t have this item in your cart');
        }
    }
    public function postUpdate(Request $r){
        //Get the cart item
        $CartItem = Cart::where('id' , $r->item_id)->where('user_id' , $r->user_id)->where('status' , 'active')->whereDate('created_at' , Carbon::today())->first();
        if($CartItem->Product->inventory_value < $r->qty){
            return response(__('controllers.cart_max_amount') .$CartItem->Product->inventory_value  , 404);
        }else{
            if($CartItem){
                $CartItem->update([
                    'qty' => $r->qty
                ]);
                return response(__('controllers.cart_value_updated'));
            }else{
                return response(__('controllers.cart_item_not_available') , 404);
            }
        }

    }
    public function getCartPage(){
        if(auth()->check()){$UserId = auth()->user()->id;}else{$UserId = Cookie::get('guest_id');}
        $CartItems = Cart::where('user_id' , getUserId())->where('status' , 'active')->whereDate('created_at' , Carbon::today())->get();
        $CartSubTotalArray = $CartItems->map(function($item) {
            return $item->Product->final_price * $item->qty;
        });
        $Total = $CartSubTotalArray->sum();
        //Check id there is a coupon code applied
        $CouponDiscount = null;
        if(isset($CartItems->first()->applied_coupon)){//There is an applied coupon
            $CouponData = explode('-',$CartItems->first()->coupon_amount );
            // $CouponDiscountType = $CouponData[1];
            // $CouponDiscountAmount = $CouponData[0];
            if($CouponData[1] == 'fixed'){
                $CouponDiscount = $CouponData[0];
            }elseif($CouponData[1] == 'percent'){
                $CouponDiscount = ($Total * $CouponData[0]) / 100;
            }else{
                $CouponDiscount = $CouponData[0];
            }
        }
        $SubTotal = ($CartSubTotalArray->sum()) - $CouponDiscount;
        $ShippingCostCountries = ShippingCost::pluck('country_name')->unique();
        return view('orders.cart' , compact('CartItems' , 'Total' ,'SubTotal','CouponDiscount' , 'ShippingCostCountries'));
    }
}
