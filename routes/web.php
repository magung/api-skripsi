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

$router->get('/hello', function () use ($router) {
    return "Hello World";
});

$router->get('/user', 'UserController@index');
$router->get('/user/{id}', 'UserController@edit');
$router->post('/user/store', 'UserController@store');
$router->post('/user/update/{id}', 'UserController@update');
$router->get('/user/delete/{id}', 'UserController@delete');

$router->get('/role', 'RoleController@index');
$router->get('/role/{id}', 'RoleController@edit');
$router->post('/role/store', 'RoleController@store');
$router->post('/role/update/{id}', 'RoleController@update');
$router->get('/role/delete/{id}', 'RoleController@delete');

$router->get('/branch', 'BranchController@index');
$router->get('/branch/{id}', 'BranchController@edit');
$router->post('/branch/store', 'BranchController@store');
$router->post('/branch/update/{id}', 'BranchController@update');
$router->get('/branch/delete/{id}', 'BranchController@delete');