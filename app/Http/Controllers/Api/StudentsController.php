<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    protected $guard = 'students';
    public function __construct()
    {
        $this->middleware('auth:api')->except('test');
    }

    public function test(Request $request)
    {
        $credentials = $request->only('number', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return $this->response->errorUnauthorized('登录失败');
    }

    public function test1()
    {
        return response()->json(
            [
                'ret' => $this->guard()->user()
            ]
        );
    }

    protected function respondWithToken($token)
    {
        return response()->json([
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
