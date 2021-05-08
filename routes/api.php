<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//USER-AUTH
Route::post('register' , 'App\Http\Controllers\Auth\AuthController@register');
Route::post('login' , 'App\Http\Controllers\Auth\AuthController@login');
Route::post('logout' , 'App\Http\Controllers\Auth\AuthController@logout');

//Restaurant auth
Route::post('restaurant-register', 'App\Http\Controllers\Auth\RestaurantAuthController@register');
Route::post('restaurant-login', 'App\Http\Controllers\Auth\RestaurantAuthController@login');
Route::post('restaurant-logout', 'App\Http\Controllers\Auth\RestaurantAuthController@logout');

Route::group(['middleware' => 'auth:restaurant'],function () {
    Route::get('restaurant-me', 'App\Http\Controllers\Auth\RestaurantAuthController@user');
    Route::get('dashboard', 'App\Http\Controllers\TimelineController@dashboard');
});

//wanna protect
Route::group( ['middleware'=> 'jwt.auth'] , function () {
 Route::get('me' , 'App\Http\Controllers\Auth\AuthController@user');
 Route::get('timeline' , 'App\Http\Controllers\TimelineController@index');
 Route::post('profile' , 'App\Http\Controllers\Auth\AuthController@profile');
});


