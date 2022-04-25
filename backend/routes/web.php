<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', ['uses' => 'HomeController@doc']);

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', ['uses' => 'UserController@index']);
    $router->get('/{id}', ['uses' => 'UserController@show']);
    $router->post('/', ['uses' => 'UserController@store']);
    $router->put('/{id}', ['uses' => 'UserController@update']);
    $router->patch('/{id}', ['uses' => 'UserController@update']);
    $router->delete('/{id}', ['uses' => 'UserController@delete']);
    $router->post('/{id}/photo', ['uses' => 'UserController@photo']);
});