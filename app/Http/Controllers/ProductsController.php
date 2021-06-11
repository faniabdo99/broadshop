<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use DB;
use Carbon\Carbon;
//Models
use App\Models\Setting;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Product_Local;
use App\Models\Product_Variation;
use App\Models\Discount;
//Mails
use App\Mail\QuestionAboutProduct;
class ProductsController extends Controller{
    private function getAllTags(){
        $TagsList = Product::all()->pluck('tags');
        $MasterTagsArray = [];
        foreach($TagsList as $Tag){
            $Tag = explode(',' , $Tag );
            $CleanTag = array_unique($Tag);
            //Push to the master array
            array_push($MasterTagsArray , $CleanTag);
        }
        if(empty($MasterTagsArray)){
            $MasterTagsArray = [[], []];
        }
        $ReadyToUseTagsArray = array_unique($FinalMasterTagsArray = call_user_func_array('array_merge', $MasterTagsArray));
        return $ReadyToUseTagsArray;
    }
    public function getHome(){
        $Products = Product::latest()->get();
        return view('admin.product.index' , compact('Products'));
    }
    public function getNew(){
        $AllCategories = Category::latest()->get();
        $id = DB::select("SHOW TABLE STATUS LIKE 'products'");
        $NextProductId= $id[0]->Auto_increment + 1;
        $ReadyToUseTagsArray = $this->getAllTags();
        $DiscountsList = Discount::whereDate('valid_until' , '>' , Carbon::today())->get();
        return view('admin.product.new' , compact('AllCategories' , 'NextProductId' , 'ReadyToUseTagsArray' , 'DiscountsList'));
    }
    public function postNew(Request $r){
        //Validate the request
        $Rules = [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:products',
            'description' => 'required|min:25',
            'body' => 'required|min:40',
            'id' => 'required|integer',
            'price' => 'required|numeric',
            'inventory' => 'required|numeric',
            'min_order' => 'required|numeric',
            'weight' => 'numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'tax_rate' => 'required',
            'image' => 'nullable|image|max:45000000'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all())->withInput();
        }else{
            //Prepare The Data For Uploading
            $ProductData = $r->except('custom_tags');
            //Check the Discount
            if($r->has('discount_id') && $r->discount_id != null){
                //Get the discount
                $TheDiscount = Discount::find($r->discount_id);
                if($TheDiscount->type == 'fixed'){
                    if($TheDiscount->amount >= $r->price){
                        return back()->withErrors('The Discount is Bigger Than The Item Price')->withInput();
                    }
                }
            }
            //Handle The Image
            if($r->has('image')){
                $ProductData['image'] = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/products' , $ProductData['image']);
            }else{
                $ProductData['image'] = 'product.png';
            }
            $ProductData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            $ProductData['show_inventory'] = ($r->show_inventory == 'on') ? 1 : 0;
            $ProductData['is_promoted'] = ($r->is_promoted == 'on') ? 1 : 0;
            $ProductData['allow_reviews'] = ($r->allow_reviews == 'on') ? 1 : 0;
            $ProductData['allow_reservations'] = ($r->allow_reservations == 'on') ? 1 : 0;
            $ProductData['price'] = sprintf("%.2f",$r->price);
            $ProductData['user_id'] = auth()->user()->id;
            $NewProduct = Product::create($ProductData);
            return redirect()->route('admin.products.home')->withSuccess('Product Created Successfully !');
        }
    }
    //Edit
    public function getEdit($id){
        $ProductData = Product::findOrFail($id);
        $AllCategories = Category::latest()->get();
        $ReadyToUseTagsArray = $this->getAllTags();
        $DiscountsList = Discount::whereDate('valid_until' , '>' , Carbon::today())->get();
        return view('admin.product.edit' , compact('ProductData' ,'AllCategories' , 'ReadyToUseTagsArray' , 'DiscountsList'));
    }
    public function postEdit(Request $r , $id){
        $TheProduct = Product::find($id);
        //Validate the request
        $Rules = [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:25',
            'body' => 'required|min:40',
            'id' => 'required|integer',
            'price' => 'required|numeric',
            'inventory' => 'required|numeric',
            'min_order' => 'required|numeric',
            'weight' => 'numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'tax_rate' => 'required',
            'image' => 'image|max:45000000'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all())->withInput();
        }else{
            //Prepare The Data For Uploading
            $ProductData = $r->except('custom_tags');
            //Check the Discount
            if($r->has('discount_id') && $r->discount_id != null){
                //Get the discount
                $TheDiscount = Discount::find($r->discount_id);
                if($TheDiscount->type == 'fixed'){
                    if($TheDiscount->amount >= $r->price){
                        return back()->withErrors('The Discount is Bigger Than The Item Price')->withInput();
                    }
                }
            }
            //Handle The Image
            if($r->has('image')){
                $ProductData['image'] = $TheProduct->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/products' , $ProductData['image']);
            }else{
                $ProductData['image'] = $TheProduct->image;
            }
            $ProductData['show_inventory'] = ($r->show_inventory == 'on') ? 1 : 0;
            $ProductData['is_promoted'] = ($r->is_promoted == 'on') ? 1 : 0;
            $ProductData['allow_reviews'] = ($r->allow_reviews == 'on') ? 1 : 0;
            $ProductData['allow_reservations'] = ($r->allow_reservations == 'on') ? 1 : 0;
            $ProductData['user_id'] = auth()->user()->id;
            $ProductData['price'] = sprintf("%.2f",$r->price);
            $TheProduct->update($ProductData);
            return redirect()->route('admin.products.home')->withSuccess('Product Updated Successfully !');
        }
    }
    //Delete
    public function delete(Request $r){
        Product::findOrFail($r->item_id)->delete();
        return response('Product Deleted');
    }
    //Upload Gallery Images
    public function uploadGalleryImages(Request $r){
        //Validate the Request
        $Rules = [
            'image' => 'required|image|max:45000000',
            'product_id' => 'required'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return response($validator->errors()->first());
        }else{
            //Store the image in the file system
            $ImageName = $r->slug.'-'.rand(1,999).'-'.$r->product_id.'.'.$r->image->getClientOriginalExtension();
            $r->image->storeAs('images/products/gallery' , $ImageName);
            //Upload to the database
            Product_Image::create([
                'product_id' => $r->product_id,
                'image' => $ImageName
            ]);
            return response('Image Uploaded');
        }
    }
    public function deleteGalleryImages($product_id){
      Product_Image::where('product_id' , $product_id)->delete();
      return back()->withSuccess('Product Gallery Images Deleted');
    }
    //Localize
    public function getLocalize($id){
        $Product = Product::findOrFail($id);
        $SystemLangs = explode(',' , Setting::where('title' , 'languages_list')->first()->value);
        return view('admin.product.localize' , compact('Product' , 'SystemLangs'));
    }
    public function postLocalize(Request $r){
        $Rules = [
            'title_value' => 'required|min:5|max:255',
            'description_value' => 'required|min:25',
            // 'body_value' => 'required|min:25',
            'lang_code' => 'required',
            'product_id' => 'required'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            $Respone = [
                'error' => true,
                'list' => $validator->errors()->all()
            ];
            return response($Respone);
        }else{
            //Check if this is existing and update it accordingly
            $LocalizedData = Product_Local::where('lang_code' , $r->lang_code)->where('product_id' , $r->product_id)->first();
            $LocalizedDataFromRequest = $r->all();
            $LocalizedDataFromRequest['body_value'] = $r->description_value;
            if($LocalizedData != null){
                //Update
                $LocalizedData->update($LocalizedDataFromRequest);
                $Respone = [
                    'error' => false,
                    'list' => 'Translation Updated'
                ];
                return response($Respone);
            }else{
                //Create
                $NewLocalizedData = Product_Local::create($LocalizedDataFromRequest);
                $Respone = [
                    'error' => false,
                    'list' => 'Translation Created'
                ];
                return response($Respone);
            }
        }
    }
    public function getVariation($id){
        $TheProduct = Product::findOrFail($id);
        $AllVariations = Product_Variation::where('product_id' , $id)->latest()->get();
        return view('admin.product.variation' , compact('TheProduct' , 'AllVariations'));
    }
    public function deleteVariation($id){
        $TheVariation = Product_Variation::findOrFail($id)->delete();
        return back()->withSuccess('Deleted Successfully');
    }
    public function postVariation(Request $r, $id){
        //Validate the request
        $Rules = [
            'color' => 'required',
            'color_code' => 'required',
            'inventory' => 'required',
            'status' => 'required',
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Create new variation
            $TheProduct = Product::findOrFail($id);
            $VariationData = $r->all();
            $VariationData['ref_code'] = $TheProduct->id.'_'.$r->color;
            $VariationData['product_id'] = $TheProduct->id;
            Product_Variation::create($VariationData);
            return back()->withSuccess('Variation Created');
        }
    }
    //Non-Admin Routes
    public function getAll(Request $r){
        $FiltersCode = '';
        if($r->has('category_filters') && !empty($r->category_filters) && $r->category_filters != null){
            $TheCategory = Category::where('slug' , $r->category_filters)->first();
            $FiltersCode = "->where('category_id' , \$TheCategory->id)";
        }
        if($r->has('season_filters') && !empty($r->season_filters) && $r->season_filters != null){
            $Season = $r->season_filters;
            $FiltersCode = $FiltersCode . "->where('season' , \$Season)";
        }
        if($r->has('gender_filters') && !empty($r->gender_filters) && $r->gender_filters != null){
            $Gender = $r->gender_filters;
            $FiltersCode = $FiltersCode . "->where('gender' , \$Gender)";
        }
        $Query = '$Products = App\Product::orderBy("id" , "desc")'.$FiltersCode.'->get();';
        eval($Query);
        //Must Use Vars
        $Categories = Category::latest()->get();
        $FiltersList = $this->getAllTags();
        return view('products.index' , compact('Categories' , 'FiltersList' , 'Products' ));
    }
    public function getWithFilter($Category){
        $TheCategory = Category::where('slug' , $Category)->first();
        $Categories = Category::latest()->get();
        $FiltersList = $this->getAllTags();
        $Products = Product::where('category_id' , $TheCategory->id)->where('status','!=','Invisible')->latest()->get();
        return view('products.index' , compact('Categories' , 'FiltersList' , 'Products'));
    }
    public function getIndex($Category = null){
        $TheCategory = null;
        if($Category){
            $TheCategory = Category::where('slug' , $Category)->first();
            $AllProducts = Product::where('status' , '!=' , 'Invisible')->where('category_id' , $TheCategory->id)->get();
        }else{
            $AllProducts = Product::where('status' , '!=' , 'Invisible')->get();
        }
        $AllCategories = Category::latest()->get();
        return view('products.index' , compact('AllProducts' , 'AllCategories' , 'TheCategory'));
    }
    public function getSingle($slug , $id){
        $TheProduct = Product::findOrFail($id);
        if($TheProduct->status == 'Invisible'){
            abort(404);
        }
        return view('products.single' , compact('TheProduct'));
    }
    public function askQuestion(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'country' => 'required',
            'message' => 'required'
        ];
        $Messages = [
            'name.required' => __('controllers.product_Q_validation_name_required'),
            'email.email' => __('controllers.product_Q_validation_email_email'),
            'email.required' => __('controllers.product_Q_validation_email_required'),
            'phone_number.required' => __('controllers.product_Q_validation_phone_number_required'),
            'country.required' => __('controllers.product_Q_validation_country_required'),
            'message.required' => __('controllers.product_Q_validation_message_required')
        ];
        $validator = Validator::make($r->all() , $Rules ,$Messages);
        if($validator->fails()){
            return response($validator->errors()->all() , 403);
        }else{
            //Send Message to The Admin
            app()->setLocale($r->site_locale);
            Mail::to('faniabdo99@gmail.com')->send(new QuestionAboutProduct($r->all()));
            return response(__('controllers.product_Q_received'));
        }
    }
}
