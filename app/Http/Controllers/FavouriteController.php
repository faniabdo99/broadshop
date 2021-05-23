<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Product;
use App\Models\Favourite;
class FavouriteController extends Controller{
    public function ToggleFavourite(Request $r){
        //Validate the request 
        $Rules = [
            'user_id' => 'required|numeric',
            'product_id' => 'required|numeric'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return response('Sorry, Something went wrong!' , 403);
        }else{
            //Check the product
            Product::findOrFail($r->product_id);
            //Check if the record exists
            $FavRecord = Favourite::where('user_id' , $r->user_id)->where('product_id' , $r->product_id)->first();
            if($FavRecord == null){
                //Add a Like
                Favourite::create($r->all());
                return response('This product has been added to your favourite');
            }else{
                //Remove the Like
                $FavRecord->delete();
                return response('This product has been removed from your favourite');
            }
        }
    }
}
