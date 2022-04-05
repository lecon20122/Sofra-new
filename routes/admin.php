<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DataTables\OrderController;
use App\Http\Controllers\Admin\DataTables\ProductController;
use App\Http\Controllers\Admin\DataTables\ProductsController;
use App\Http\Controllers\Admin\DataTables\RestaurantController;
use App\Http\Controllers\Admin\DataTables\StoreController;
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

//Login - Post Login ( Admin  - Restaurant Accounts)
Route::get('admin-auth', [AuthController::class, 'login'])->name('adminLogin');
Route::get('become-a-partner', [RestaurantAuthController::class, 'login'])->name('restaurantLogin');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('restaurant-postLogin', [RestaurantAuthController::class, 'postLogin'])->name('restaurant-auth');
//Login - Post Login ( Admin  - Restaurant Accounts)

//Restaurant Registration
Route::post('restaurant-register',[RestaurantAuthController::class , 'register'])->name('restaurant-register');

//Store Administration
Route::middleware(['auth:restaurant'])->prefix('store')->group(function () {
    //admin panel view
    Route::get('dashboard', [AuthController::class, 'restaurantIndex'])->name('restaurant-dashboard');
    //myOrders-view
    Route::get('restaurant', [StoreController::class, 'view'])->name('myOrdersView');
    //getting restaurant orders
    Route::get('my-orders',[StoreController::class , 'index'])->name('restaurant-orders');
    //updating-order
    Route::patch('my-orders/{id}', [OrderController::class, 'update'])->name('myOrder-update');
    //myStore-view
    Route::get('me', [StoreController::class, 'myStoreView'])->name('myStore-view');
    //myStore
    Route::get('my-store', [StoreController::class, 'myStore'])->name('myStore-index');
    //myStore-update
    Route::patch('my-store/{id}', [StoreController::class, 'update'])->name('myStore-update');
    //myProducts-view
    Route::get('products', [ProductsController::class, 'view'])->name('myProducts-view');
    //myStore-products
    Route::get('myProducts', [ProductsController::class, 'myProducts'])->name('myStore-products');
    //myStore-Products
    Route::patch('myProducts/{id}', [ProductsController::class, 'update'])->name('products-update');
    //myStore-Products
    Route::post('newProduct', [ProductsController::class, 'store'])->name('newProduct');

    //store logout
    Route::get('logout', [StoreController::class, 'logout'])->name('store-logout');

});

//(Management) prefixed with /admin/*
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
