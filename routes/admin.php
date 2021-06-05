<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DataTables\RestaurantController;
use App\Http\Controllers\Admin\DataTables\UsersController;
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
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AuthController::class, 'index'])->name('dashboard');

    //Restaurants
    //view
    Route::get('restaurant', [RestaurantController::class, 'view'])->name('restaurant-view');
    //index
    Route::get('restaurant-index', [RestaurantController::class, 'index'])->name('restaurant-index');

    //Users
    //view
    Route::get('users', [UsersController::class, 'view'])->name('user-view');
    //index
    Route::get('users-index', [UsersController::class, 'index'])->name('user-index');

});
