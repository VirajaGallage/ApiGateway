<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//API Gateway Routes

$router->group(['prefix' => 'api', 'middleware' => ['client.credentials']], function () use ($router) {
    $router->group(['prefix' => 'Ad'], function () use ($router) {
        $router->get('index', ['uses' => 'CustomerController@index']);
        $router->post('create-ad', ['uses' => 'CustomerController@store']);
        $router->post('slip-upload',['uses' => 'CustomerController@payementslipUpload']);
        $router->get('search/{ads}', ['uses' => 'CustomerController@show']);
        $router->put('editAd/{ads}', ['uses' => 'CustomerController@update']);
        $router->delete('removeAd/{ads}', ['uses' => 'CustomerController@destroy']);
    });
    $router->group(['prefix' => 'staff'], function () use ($router) {
        $router->get('index', ['uses' => 'StaffController@index']);
        $router->post('live-ad', ['uses' => 'StaffController@insertlivead']);
        $router->get('index/{Ad}',['uses'=> 'StaffController@getAdById']);
        $router->post('send-email', ['uses' => 'StaffController@SendEmail']);
        $router->get('payementslips', ['uses' => 'StaffController@fetchSLips']);
    });
});

//Auth Routes

$router->post('register',['as' => 'register', 'uses' => 'UserController@register']);
$router->post('login',['as' => 'login', 'uses' => 'UserController@login']);
$router->post('test',['as' => 'test', 'uses' => 'UserController@test']);
