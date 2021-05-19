<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller{
    public function getSoon(){
        return view('soon');
    }
    public function getIndex(){
        $LatestArticles = Post::where('active' , 1)->latest()->limit(3)->get();
        return view('index' , compact('LatestArticles'));
    }
}
