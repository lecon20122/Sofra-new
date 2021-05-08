<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{RegisterFormRequest , LoginFormRequest, ProfileFormRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    protected $auth;
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;

    }


    public function login(LoginFormRequest $request)
    {
        try {
            if (!$token = $this->auth->attempt($request->only('email' , 'password'))) {
                return response()->json([
                    'errors' => [
                        'root' => 'Wrong Credentials'
                    ]
                ] , 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed'
                ]
            ] , $e->getCode());
        }

        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
            ],200);
    }

    public function register(RegisterFormRequest $request )
    {

        $user = User::create($request->validated()) ;

       $token =  $this->auth->attempt($request->only('email' , 'password'));

       return response()->json([
           'data' => $user,
           'meta' => [
               'token' => $token
           ]
           ],200);
    }


    public function profile(ProfileFormRequest $request)
    {
        try {
            $user = User::find($request->user()->id);
            $user->update($request->validated());
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong , try again'
            ], 200);
        }
        return response()->json([
            'message' => 'User Profile Updated Successfully'
        ], 200);

    }

    public function logout()
    {
        $this->auth->invalidate($this->auth->getToken());
        return response(null,200);
    }

    public function user(Request $request)
    {
        return response()->json([
            'data' => $request->user(),
            ]);
    }
}
