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
            'email.required' => 'Je e-mailadres is verplicht',
            'email.email' => 'Uw e-mailadres is ongeldig',
            'email.unique' => 'Uw e-mailadres staat al in onze nieuwsbrief'
        ];
        $Validator = Validator::make($r->all(), $Rules , $ErrorMessages);
        if($Validator->fails()){
            return response($Validator->errors()->first() , 400);
        }else{
            //Do stuff
            Newsletter::create($r->all());
            return response('U bent nu aangemeld voor onze nieuwsbrief!' , 200);
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
