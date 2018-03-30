<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version(
    'v1',
    [
        'namespace' => 'App\Http\Controllers\Api'
    ], function ($api) {
        $api->group(
            [
                'middleware' => 'api.throttle',
                'limit' => config('api.rate_limits.access.limit'),
                'expires' => config('api.rate_limits.access.expires'),
            ], function ($api) {
            $api->post('test', 'TestController@test')
                ->name('api.test.test');
        });
    }
);