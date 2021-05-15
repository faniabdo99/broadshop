<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Validator;
use App\Mail\ContactUsMail;
class ContactController extends Controller{
    public function getContact(){
        return view('contact');
    }
    public function postContact(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Send the email
            Mail::to('admin@broadshop.com')->send(New ContactUsMail($r->all()));
            return redirect()->back()->withSuccess('Your email has been recived, Thank you!');
        }
    }
}
