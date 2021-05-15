<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Newsletter;
class NewsletterController extends Controller{
    public function postSignup(Request $r){
        //Validate the request
        $Rules = [
            'email' => 'required|email|unique:newsletters'
        ];
        $ErrorMessages = [
            'email.required' => 'Your email is required',
            'email.email' => 'Your email is invalid',
            'email.unique' => 'Your email is already listed in our newsletter'
        ];
        $Validator = Validator::make($r->all(), $Rules , $ErrorMessages);
        if($Validator->fails()){
            return response($Validator->errors()->first() , 400);
        }else{
            //Do stuff
            Newsletter::create($r->all());
            return response('You are now signed up to our newsletter!' , 200);
        }
    }
    public function getAll(){
        $AllNewsletter = Newsletter::latest()->get();
        return view('admin.newsletter.all' , compact('AllNewsletter'));
    }
    public function delete($id){
        Newsletter::findOrFail($id)->delete();
        return back()->withSuccess('Record Deleted');
    }
}
