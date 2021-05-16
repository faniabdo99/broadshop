<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Discount extends Model{
    protected $guarded = [];
    protected $dates = ['valid_until'];
    public function ActiveOnProducts(){
        return $this->hasMany(Product::class);
    }
}
