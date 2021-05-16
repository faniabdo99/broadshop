<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Str;
use App\Models\Category_local;
class Category extends Model{
    protected $guarded = [];
    public function getImagePathAttribute(){
        return url('storage/app/images/categories/'.$this->image);
    }
    public function getShortDescriptionAttribute(){
        return Str::limit($this->description , 60);
    }
    public function getLocalTitleAttribute(){
        $CurrentLang = app()->getLocale() ?? 'en';
        //Get The Title From Localized Table
        $LocalizedRow = Category_local::where('category_id' , $this->id)->where('lang_code' , $CurrentLang)->first();
        if($LocalizedRow != null){
            return $LocalizedRow->title_value;
        }else{
            return $this->title;
        }
    }
    public function Product(){
        return $this->hasMany(Product::class , 'category_id');
    }
}
