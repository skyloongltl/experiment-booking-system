<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',
    [
        'namespace' => 'App\Http\Controllers\Api'
    ], function ($api) {
        $api->post('test', 'TestController@test')
            ->name('api.test.test');
});