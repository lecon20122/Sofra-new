<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            return redirect()->route('dashboard');
        } else {
            return view('layouts.restaurant-login');
        }
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $remember_me = $request->has('remember_me') ? true : false;


        $credentials = [
            'email' => $request->input("email"),
            'phone' => $request->input("phone")
        ];
        if (Auth::guard('restaurant')->attempt($credentials, $remember_me)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Wrong Credentials , please try again']);
        }
    }

    public function logout()
    {
        $logout = auth('restaurant');
        $logout->logout();
        return redirect()->route('adminLogin');
    }

}
