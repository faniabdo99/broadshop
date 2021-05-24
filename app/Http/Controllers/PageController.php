<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
class PageController extends Controller{
    public function getSoon(){
        return view('soon');
    }
    public function getIndex(){
        $LatestArticles = Post::where('active' , 1)->latest()->limit(3)->get();
        $BestSeller = Product::where('is_promoted' , 1)->latest()->get();
        return view('index' , compact('LatestArticles', 'BestSeller'));
    }
    public function getAbout(){
        return view('about');
    }
}
