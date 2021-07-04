<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RestaurantRegisterRequest;
use App\Models\Restaurant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantAuthController extends Controller
{
    protected function index()
    //checking if admin is already login if not will redirect to admin Login
    {
        return view('layouts.admin');
    }

    protected function login()
    //checking if admin is already login if not will redirect to admin Login
    {
        if (auth('restaurant')->check()) {
            return redirect()->route('restaurant-dashboard');
        } else {
            return view('layouts.restaurant-login');
        }
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $remember_me = $request->has('remember_me') ? true : false;


        $credentials = [
            'phone' => $request->input("phone"),
            'password' => $request->input("password"),
        ];
        if (Auth::guard('restaurant')->attempt($credentials, $remember_me)) {
            return redirect()->route('restaurant-dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Wrong Credentials , please try again']);
        }
    }

    public function register(RestaurantRegisterRequest $request)
    {
        Restaurant::create($request->validated());
        return back()->with('success',' Thank you for consider joining Sofra , We will contact you as soon as posable on your phone');
    }

    public function logout()
    {
        $logout = auth('restaurant');
        $logout->logout();
        return redirect()->route('adminLogin');
    }

}
