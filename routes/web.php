<?php
use Illuminate\Support\Facades\Route;
Route::get('/' , 'PageController@getIndex')->name('home');