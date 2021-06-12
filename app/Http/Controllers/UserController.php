<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Validator;
use Mail;
use Image;
use Socialite;
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeNewUser;
class UserController extends Controller{
    //Traditional Singup
    public function getSignup(){
        return view('user.signup');
    }
    public function postSignup(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
            'agree' => 'required'
        ];
        $ErrorMessages = [
            'name.required' => 'Your name is required',
            'email.required' => 'Your email is required',
            'email.email' => 'Your email is invalid',
            'email.unique' => 'This email is already registered',
            'phone.required' => 'Your phone number is required',
            'phone.unique' => 'This phone number is already registered',
            'password.required' => 'Your password is required',
            'password.confirmed' => 'Your password confirmation dosent match!',
            'agree.required' => 'Please agree to the terms of use and privacy policy'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Create the user
            $UserData = $r->except(['_token' , 'agree' , 'password_confirmation']);
            $UserData['password'] = Hash::make($r->password);
            $UserData['code'] = rand(1,9999);
            $TheUser = User::create($UserData);
            Auth::loginUsingId($TheUser->id);
            //Send Welcome Email
            Mail::to($TheUser->email)->send(new WelcomeNewUser($TheUser));
            return redirect()->route('home');
        }
    }
    //Traditional Signin
    public function getSignin(){
        return view('user.signin');
    }
    public function postSignin(Request $r){
        //Validate the request
        $Rules = [
        'email' => 'required|email',
        'password' => 'required'
        ];
        $ErrorMessages = [
            'email.required' => 'Your email is required',
            'email.email' => 'Your email is invalid',
            'password.required' => 'Your password is required'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Log the user in
            $Remeber = false;
            if($r->has('remember')){
                $Remeber = true;
            }
            $creds = $r->except(['_token' , 'remember']);
            if(Auth::attempt($creds, $Remeber)){
                return redirect()->route('home');
            }else{
                return back()->withErrors('Please double-check your email and password');
            }
            
        }
    }
    public function getResetPage(){
        return view('user.reset');
    }
    public function postResetPage(Request $r){
        //Validation
        $Rules = [
            'email' => 'required|email'
        ];
        $ErrorMessages = [
            'email.requried' => 'Your email is required',
            'email.email' => 'The email format is invalid'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Check if this email exists
            $TheUser = User::where('email',$r->email)->first();
            if($TheUser){
                //Send Reset Email
                try {
                    Mail::to($TheUser->email)->send(new ResetPasswordMail($TheUser));
                } catch (Exception $e) {    
                    if (count(Mail::failures()) > 0) {
                        return back()->withErrors('Something went wrong, please try again');
                    }
                }
                return back()->withSuccess("We sent an email to your account, Please follow the instructions sent to you");
            }else{
                return back()->withErrors("This email dosen't exist");
            }
        }
    }
    public function getChoosePasswordPage($email,$code){
        $TheUser = User::where('email' , $email)->first();
        if($TheUser){
            if(md5($TheUser->code) == $code){
            //Return the Page
                return view('user.choose-password' , compact('TheUser'));
            }else{
                return redirect()->route('home')->withErrors('User Identification Code is not correct');
            }
        }else{
            return redirect()->route('home')->withErrors('There is no user associated to this email');
        }
    }
    public function postChoosePasswordPage(Request $r){
        //Validation
        $Rules = [
            'user_id' => 'required|numeric',
            'user_code' => 'required',
            'password' => 'required|min:5|confirmed',
        ];
        $ErrorMessages = [
            'user_id.required' => 'Something went wrong, Please try again',
            'user_id.numeric' => 'Something went wrong, Please try again',
            'user_code.required' => 'Something went wrong, Please try again',
            'password.required' => 'Your new password is required',
            'password.min' => 'Your new password is too short, Please choose a password longer than 5 Characters',
            'password.confirmed' => 'Password confirmation faild! Please try again'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            $TheUser = User::findOrFail($r->user_id);
            if($TheUser){
            if(md5($TheUser->code) == $r->user_code){
                //Update The Passowrd
                $TheUser->update(['password' => Hash::make($r->password)]);
                Auth::loginUsingId($TheUser->id);
                return redirect()->route('home')->withSuccess('Password updated successfully');
            }else{
                return back()->withErrors('Something went wrong, Please try again');
            }
            }else{
            return back()->withErrors('Something went wrong, Please try again');
            }
        }
    }
    public function activate($code , $email){
        $TheUser = User::where('code' , $code)->first();
        if($TheUser){
          if($TheUser->email == $email){
            $TheUser->update([
              'active' => 1
            ]);
            Auth::loginUsingId($TheUser->id);
            return redirect()->route('home')->withSuccess('Your account has been activated');
          }else{
            return redirect()->route('home')->withErrors('The activation code is invalid!');
          }
        }else{
          return redirect()->route('home')->withErrors('The activation code is invalid!');
      }
    }
    public function getProfile(){
        return view('user.profile');
    }
    public function getOrders(){
        return view('user.orders');
    }
    public function getEditProfile(){
        return view('user.edit');
    }
    public function postEditProfile(Request $r){
        //Validate
        $Rules = [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|max:5200000',
            'phone' => 'required'
        ];
        $ErrorMessages = [
            'name.required' => 'Your name is required',
            'email.required' => 'Your email is required',
            'email.email' => 'Your email is invalid',
            'email.unique' => 'This email is already registered',
            'image.image' => 'The image is invalid',
            'image.max' => 'Max image size allowed is 5MB',
            'phone.required' => 'Your phone number is required',
            'phone.unique' => 'This phone number is already registered',
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Check the email and phone
            if($r->email != auth()->user()->email){
                //Check if the email is there
                if(User::where('email' , $r->email)->count() > 0){
                    return back()->withErrors('This email is already registered');
                }
            }
            if($r->phone != auth()->user()->phone){
                //Check if the email is there
                if(User::where('phone' , $r->phone)->count() > 0){
                    return back()->withErrors('This phone is already registered');
                }
            }
            $UserData = $r->except(['image' , '_token']);
            $TheUser = User::findOrFail(auth()->user()->id);
            //Check if there is an image
            if($r->has('image')){
                //Upload the image and set the name
                $Image = Image::make($r->image)->resize(150,150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $Image->save('storage/app/public/users/'.$TheUser->id.'.'.$r->image->getClientOriginalExtension());
                $UserData['image'] = $Image->basename;
            }
            $TheUser->update($UserData);
            return back()->withSuccess('Your profile information updated');
        }
    }
    public function getEditPassword(){
        return view('user.update-password');
    }
    public function postEditPassword(Request $r){
        //Validate the request
        $Rules = [
        'current_pass' => 'required',
        'password' => 'required|min:5|confirmed',
        ];
        $ErrorMessages = [
        'current_pass.required' => 'Current password is required',
        'password.required' => 'New password is required',
        'password.min' => 'New password must be at least 5 charachters',
        'password.confirmed' => 'Password confirmation doesn\'t match'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Update pass
            $TheUser = User::find(auth()->user()->id);
            if(Hash::check($r->current_pass , $TheUser->password)){
                $TheUser->update(['password' => Hash::make($r->password)]);
                return back()->withSuccess('Your password is now updated');
            }else{
                return back()->withErrors('Current password is not correct');
            }
        }
    }
    public function getWishlist(){
        return view('user.wishlist');
    }
    public function signout(){
        Auth::logout();
        return redirect()->route('home');
    }
    //Admin Related Stuff
    public function getHome(){
        $Users = User::latest()->get();
        return view('admin.user.index' , compact('Users'));
    }
    public function delete(Request $r){
        $User = User::findOrFail($r->item_id)->delete();
        return response("User Deleted Successfully");
    }
    public function ToggleActive(Request $r){
        $User = User::findOrFail($r->item_id)->first();
        $User->active = !$User->active;
        $User->save();
        if($User->active == 1){
        return response([
            'successMessage' => 'User Activated',
            'btnMessage' => 'Deactivate'
        ]);
        }else{
        return response([
            'successMessage' => 'User Deactivated',
            'btnMessage' => 'Activate'
        ]);
        }
    }
    /*================================== Social auth */
    public function redirectToProvider($provider){
     return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback(Request $r , $driver){
        $user = Socialite::driver($driver)->user();
        $FindUser = User::where('email' , $user->email)->get();
        if($FindUser->count() == 0){
            //Signup
            $ProfileImage = (isset($user->avatar)) ? $user->avatar : 'user.png';
            $TheUser = User::create([
                'name' => $user->name ,
                'email' => $user->email,
                'image' => $ProfileImage,
                'password' => 'PlaceholderPass',
                'signup_method' => $driver,
                'code' =>  rand(0,99999999),
                'active' => 1
            ]);
            //Send Welcome Email
            auth()->loginUsingId($TheUser->id);
            Mail::to($TheUser->email)->send(new WelcomeNewUser($TheUser));
            return redirect()->route('home');
        }else{
            auth()->loginUsingId($FindUser->first()->id);
            return redirect()->route('home');
        }
    }
}