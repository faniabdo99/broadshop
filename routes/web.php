<?php
use Illuminate\Support\Facades\Route;
Route::get('/' , 'PageController@getIndex')->name('home');
//Add middleware here to guest only
Route::middleware('guest')->group(function () {
    Route::get('signup' , 'UserController@getSignup')->name('user.getSignup');
    Route::post('signup' , 'UserController@postSignup')->name('user.postSignup');
    Route::get('signin' , 'UserController@getSignin')->name('user.getSignin');
    Route::post('signin' , 'UserController@postSignin')->name('user.postSignin');
    Route::get('reset-password' , 'UserController@getResetPage')->name('user.getReset');
    Route::post('reset-password' , 'UserController@postResetPage')->name('user.postReset');
    Route::get('choose-password/{email}/{code}' , 'UserController@getChoosePasswordPage')->name('user.getChoosePassword');
    Route::post('choose-password/' , 'UserController@postChoosePasswordPage')->name('reset.postChoosePassword');
    Route::get('activate/{code}/{email}' , 'UserController@activate')->name('user.activate');
    //Social Signup System
    Route::get('social-login/{provider}' , 'AuthController@redirectToProvider')->name('login.social');
    Route::get('login/{driver}/callback' , 'AuthController@handleProviderCallback')->name('login.social.callback');
});
Route::middleware('auth')->group(function () {
    Route::get('profile' , 'UserController@getProfile')->name('user.getProfile');
    Route::get('profile/edit' , 'UserController@getEditProfile')->name('user.getEditProfile');
    Route::post('profile/edit' , 'UserController@postEditProfile')->name('user.postEditProfile');
    Route::get('profile/update-password' , 'UserController@getEditPassword')->name('user.getEditPassword');
    Route::post('profile/update-password' , 'UserController@postEditPassword')->name('user.postEditPassword');
    Route::get('signout' , 'UserController@signout')->name('user.signout');
});