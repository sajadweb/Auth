<?php

$router->group(['prefix' => 'auth', "middleware"=> 'check'], function () use ($router) {
    $router->get('/', "AuthController@givClintId");
    $router->group(["middleware"=> 'client'], function () use ($router) {
        $router->post('/', 'AuthController@login');
        $router->options('/', "AuthController@signup");
    });

    $router->put('/', "AuthController@updateUser");
    $router->patch('/', "AuthController@refreshToken");
    $router->post('/change/password', "AuthController@changePassword");
    $router->post('/remember/password', "AuthController@rememberPassword");
});

$router->group(['prefix' => 'profile'], function () use ($router) {
    $router->get('/', "ProfileController@getProfile");
    $router->post('/', "ProfileController@editProfile");
    $router->put('/', "ProfileController@updateProfile");
});
