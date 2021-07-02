<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DataTables\OrderController;
use App\Http\Controllers\Admin\DataTables\ProductController;
use App\Http\Controllers\Admin\DataTables\RestaurantController;
use App\Http\Controllers\Admin\DataTables\UsersController;
use App\Http\Controllers\Admin\RestaurantAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin-auth', [AuthController::class, 'login'])->name('adminLogin');
Route::get('restaurant-auth', [RestaurantAuthController::class, 'login'])->name('restaurantLogin');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('restaurant-postLogin', [RestaurantAuthController::class, 'postLogin'])->name('restaurant-auth');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AuthController::class, 'index'])->name('dashboard');
    //Admin-logout
    Route::get('logout', [AuthController::class, 'logout'])->name('admin-logout');

    //Restaurants
    //view
    Route::get('restaurant', [RestaurantController::class, 'view'])->name('restaurant-view');
    //index
    Route::get('restaurant-index', [RestaurantController::class, 'index'])->name('restaurant-index');
    //update
    Route::patch('restaurant-index/{id}', [RestaurantController::class, 'update'])->name('restaurant-update');

    //Orders
    //-view
    Route::get('orders',[OrderController::class , 'view'])->name('orders-view');
    //-index
    Route::get('order-index', [OrderController::class, 'index'])->name('order-index');
    //update
    Route::patch('order-index/{id}', [OrderController::class, 'update'])->name('order-update');

    //Users
    //view
    Route::get('users', [UsersController::class, 'view'])->name('user-view');
    //index
    Route::get('users-index', [UsersController::class, 'index'])->name('user-index');

});
