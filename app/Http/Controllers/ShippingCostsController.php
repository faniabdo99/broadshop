<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\ShippingCost;
class ShippingCostsController extends Controller{
  public function getHome(){
      $SCData = ShippingCost::latest()->get();
      return view('admin.shipping-costs.index',compact('SCData'));
  }
  public function getNew(){
      return view('admin.shipping-costs.new');
  }
  public function postNew(Request $r){
      //Validate request
      $Rules = [
          'shipping_method' => 'required',
          'country_name' => 'required',
          'weight_from' => 'required|numeric',
          'weight_to' => 'required|numeric',
          'cost' => 'required|numeric'
      ];
      $validator = Validator::make($r->all() , $Rules);
      if($validator->fails()){
          return back()->withErrors($validator->errors()->all());
      }else{
          if($r->weight_from >= $r->weight_to){
            return back()->withErrors("The Weight From Can Only be Less Than Weight to");
          }
          $SCData = $r->all();
          ShippingCost::create($SCData);
          return redirect()->route('admin.shippingCosts.home')->withSuccess('Data Added Successfully');
      }
  }
  public function getEdit($id){
      $TheSCData = ShippingCost::findOrFail($id);
      return view('admin.shipping-costs.edit' , compact('TheSCData'));
  }
  public function postEdit(Request $r , $id){
      //Validate request
      $Rules = [
        'shipping_method' => 'required',
        'country_name' => 'required',
        'weight_from' => 'required|numeric',
        'weight_to' => 'required|numeric',
        'cost' => 'required|numeric'
      ];
      $validator = Validator::make($r->all() , $Rules);
      if($validator->fails()){
          return back()->withErrors($validator->errors()->all());
      }else{
          if($r->weight_from >= $r->weight_to){
            return back()->withErrors("The Weight From Can Only be Less Than Weight to");
          }
          $SCData = $r->all();
          ShippingCost::findOrFail($id)->update($SCData);
          return redirect()->route('admin.shippingCosts.home')->withSuccess('Data Updated Successfully');
      }
  }
  public function delete(Request $r){
      ShippingCost::findOrFail($r->item_id)->delete();
      return response('Data Deleted Successfully' , 200);
  }
  public function calculateShippingCost(request $r){
    //Validate the request
    $Rules = [
      'order_weight' => 'required|numeric',
      'country_name' => 'required'
    ];
    $ErrorMessages = [
      'order_weight.required' => __('controllers.shipping_cost_validation_weight_required'),
      'order_weight.numeric' => __('controllers.shipping_cost_validation_weight_numeric'),
      'country_name.required' => __('controllers.shipping_cost_validation_country_name_required')
    ];
    $validator = Validator::make($r->all() ,$Rules,$ErrorMessages);
    if($validator->fails()){
      return response($validator->errors()->first(),500);
    }else{
      ///Do the calculations
      $ShippingCost = ShippingCost::where('country_name' , $r->country_name)->where('weight_from' , '<=' , $r->order_weight)->where('weight_to' , '>=',$r->order_weight)->first();
      if($ShippingCost){
        //Calculate Cost
        $ShippingTax = $ShippingCost->FinalCost * $r->cart_tax_avg;
        $ResponseArray = [
          'country' => $ShippingCost->country_name,
          'actual_cost_euro' => formatPrice($ShippingCost->FinalCost),
          'shipping_tax_euro' => formatPrice($ShippingTax),
          'final_cost_euro' =>formatPrice( $ShippingCost->FinalCost+$ShippingTax),
          'actual_cost_gbp' => convertCurrency(formatPrice($ShippingCost->FinalCost),'EUR','GBP'),
          'shipping_tax_gbp' => convertCurrency(formatPrice($ShippingTax),'EUR','GBP'),
          'final_cost_gbp' => convertCurrency(formatPrice($ShippingCost->FinalCost+$ShippingTax),'EUR','GBP')
        ];
        return response($ResponseArray , 200);
      }else{
        return response(__('controllers.shipping_cost_no_record'), 404);
      }
    }
  }
}
