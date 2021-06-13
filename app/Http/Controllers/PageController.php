<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App;
class PageController extends Controller{
    public function getSwitchLang($locale){
        if (! in_array($locale, ['en', 'nl'])) {
            abort(400);
        }
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function getSoon(){
        return view('soon');
    }
    public function getIndex(){
        $LatestArticles = Post::where('active' , 1)->latest()->limit(3)->get();
        $BestSeller = Product::where('is_promoted' , 1)->latest()->get();
        $HotDeals = Product::where('discount_id' ,'!=' , null)->latest()->get();
        return view('index' , compact('LatestArticles', 'BestSeller' , 'HotDeals'));
    }
    public function getAbout(){
        return view('about');
    }
    public function getToc(){
        return view('toc');
    }
}
