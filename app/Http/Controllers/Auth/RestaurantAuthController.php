<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RestaurantRegisterRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Config;

class RestaurantAuthController extends Controller
{
    protected $auth;
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;

    }


    public function login(LoginFormRequest $request)
    {
        try {
            if (!$token = auth('restaurant')->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'errors' => [
                        'root' => 'Wrong Credentials'
                    ]
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed'
                ]
            ], $e->getCode());
        }

        return response()->json([
            'data' => $request->user('restaurant'),
            'meta' => [
                'token' => $token
            ]
        ], 200);
    }


    public function register(RestaurantRegisterRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            $user = Restaurant::create($request->validated());

            $token = auth('restaurant')->attempt($credentials);

            return response()->json([
                'data' => $user,
                'meta' => [
                    'token' => $token
                ]
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed'
                ]
            ], $e->getCode());
        }

    }

    public function logout()
    {
        $this->auth->invalidate($this->auth->getToken());
        return response(null, 200);
    }

    public function user(Request $request)
    {
        return response()->json([
            'data' => $request->user('restaurant'),
        ], 200);
    }
}
