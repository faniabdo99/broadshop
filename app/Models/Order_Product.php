<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order_Product extends Model{
    protected $guarded = [];
    public function Product(){
      return $this->belongsTo(Product::class , 'product_id');
    }
    public function getTotalPriceAttribute(){
      return $this->qty * $this->Product->final_price;
    }
}
