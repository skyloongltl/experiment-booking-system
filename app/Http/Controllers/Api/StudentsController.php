<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    protected $guard = 'students';

    public function __construct()
    {
        $this->middleware('jwt.auth')->except('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('number', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token)->setStatusCode(201);
        }

        return $this->response->errorUnauthorized('登录失败');
    }

    public function getUserDetail()
    {
        return response()->json(
            [
                'ret' => $this->guard()->user()
            ]
        );
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard($this->guard);
    }
}
