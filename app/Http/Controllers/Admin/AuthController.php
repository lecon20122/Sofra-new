<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function index()
    //checking if admin is already login if not will redirect to admin Login
    {
        return view('layouts.admin');
    }
    protected function restaurantIndex()
    //checking if admin is already login if not will redirect to admin Login
    {
        return view('layouts.admin');
    }

    protected function login()
    //checking if admin is already login if not will redirect to admin Login
    {
        if (auth('admin')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('layouts.admin-login');
        }
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $remember_me = $request->has('remember_me') ? true : false;


        $credentials = [
            'email' => $request->input("email"),
            'password' => $request->input("password")
        ];
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Wrong Credentials , please try again']);
        }
    }

    public function logout()
    {
        $logout = auth('admin');
        $logout->logout();
        return redirect()->route('adminLogin');
    }

}
