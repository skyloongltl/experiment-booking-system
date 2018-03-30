<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\TestRequest;

class TestController extends Controller
{
    public function test(TestRequest $request)
    {
        return $this->response->array(
            [
                'message' => 'this is as test case' . $request->phone
            ]
        );
    }
}
