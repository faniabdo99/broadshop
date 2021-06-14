<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $guarded = [];
    public function getTotalAttribute(){
        $PriceTo = session()->has('currency') ? session()->get('currency') : 'EUR';
        return convertCurrency($this->total_amount , 'EUR' , $PriceTo);
    }
    public function getTotalTaxAttribute(){
        if($this->vat_number && $this->is_vat_valid == 'yes'){
            return 0;
        }else{
            $PriceTo = session()->has('currency') ? session()->get('currency') : 'EUR';
            return convertCurrency($this->total_tax_amount , 'EUR' , $PriceTo);
        }
    }
    public function getTotalShippingAttribute(){
        $PriceTo = session()->has('currency') ? session()->get('currency') : 'EUR';
        if($this->vat_number && $this->is_vat_valid == 'yes'){
            return convertCurrency(($this->total_shipping_cost) , 'EUR' , $PriceTo);
        }else{
            return convertCurrency(($this->total_shipping_cost+$this->total_shipping_tax) , 'EUR' , $PriceTo);
        }
    }
    public function getFinalTotalAttribute(){
        return $this->total_amount;
    }
    public function Items(){
        return Order_Product::where('order_id' , $this->id)->get();
    }
    public function getPaymentMethodTextAttribute(){
        $TextArray = [
            'creditcard' => 'Credit Card',
            'bancontact' => 'Bancontact',
            'ideal' => 'iDEAL',
        ];
        return $TextArray[$this->payment_method];
    }
    public function Customer(){
        return $this->belongsTo(User::class ,'user_id')->withDefault([
            'name' => 'Not Registered',
            'email' => 'noemain@test.com'
        ]);
    }
    public function AlreadyPaid(){
      if($this->is_paid == 'failed' || $this->is_paid == 'no'){
        return false;
      }else{
        return true;
      }
    }
}
