<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;

class CategoryController extends Controller{
    public function getAll(){
        $AllCategories = Category::latest()->get();
        return view('admin.categories.all' , compact('AllCategories'));
    }
    public function getNew(){
        return view('admin.categories.add');
    }
    public function postNew(Request $r){
        //Validate the request
        $Rules = [
            'title' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'image|max:500000'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //All Good, Next Step
            $CategoryData = $r->all();
            $CategoryData['user_id'] = auth()->user()->id;
            $CategoryData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            //Upload Images to the server
            if($r->has('image')){
                $img = ImageLib::make($r->image);
                // backup status
                $img->backup();
                // image Low Res
                $img->fit(600, 600);
                $img->save('storage/app/public/categories/'.$CategoryData['slug'].'.'.$r->image->getClientOriginalExtension());
                $CategoryData['image'] = $CategoryData['slug'].'.'.$r->image->getClientOriginalExtension();
            }
            Category::create($CategoryData);
            return redirect()->route('admin.categories.all')->withSuccess('Category Created');
        }
    }
}
