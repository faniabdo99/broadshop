<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model{
    protected $guarded = [];
    protected $appends = ['TotalPrice'];
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function getTotalPriceAttribute(){
        $this->attributes['total_price'] = $this->Product->final_price * $this->qty;
        return $this->Product->final_price * $this->qty;
    }
    public function getTotalTaxAttribute(){
        $this->attributes['total_tax'] = $this->Product->final_price * $this->tax_rate;
      return ($this->Product->final_price * $this->qty) * $this->Product->tax_rate;
    }
}
