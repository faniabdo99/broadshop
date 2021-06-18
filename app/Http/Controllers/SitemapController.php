<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;
class SitemapController extends Controller{
    public function getSitemap(){
        $AllProducts = Product::where('status' , '!=' , 'hidden')->latest()->get();
        $AllCategories = Category::latest()->get();
        $AllPosts = Post::latest()->get();
        return response()->view('sitemap.index' , compact('AllProducts' , 'AllCategories' , 'AllPosts'))->header('Content-Type', 'text/xml');
    }
}
