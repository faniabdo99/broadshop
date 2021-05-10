<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('store-newsletter' , 'NewsletterController@postSignup')->name('api.newsletter.signup');