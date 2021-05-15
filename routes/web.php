<?php
use Illuminate\Support\Facades\Route;
Route::get('/' , 'PageController@getIndex')->name('home');
Route::get('/contact' , 'ContactController@getContact')->name('contactUs');
Route::post('/contact' , 'ContactController@postContact')->name('contactUs.post'); 
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
Route::group(['prefix' => 'admin' , 'middleware' => 'admin'] , function () {
    Route::get('/' , 'AdminController@getIndex')->name('admin.home');
    Route::prefix('categories')->group(function () {
        Route::get('/' , 'CategoryController@getAll')->name('admin.categories.all');
        Route::get('add' , 'CategoryController@getNew')->name('admin.categories.getNew');
        Route::post('add' , 'CategoryController@postNew')->name('admin.categories.postNew');
    });
    Route::prefix('newsletter')->group(function () {
        Route::get('/' , 'NewsletterController@getAll')->name('admin.newsletter.all');
        Route::get('/{id}' , 'NewsletterController@delete')->name('admin.newsletter.delete');
    });
});