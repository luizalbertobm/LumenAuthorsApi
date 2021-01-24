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

$router->get('/authors', 'AuthorsController@index');
$router->post('/authors', 'AuthorsController@store');
$router->get('/authors/{id}', 'AuthorsController@show');
$router->put('/authors/{id}', 'AuthorsController@update');
$router->patch('/authors/{id}', 'AuthorsController@update');
$router->delete('/authors/{id}', 'AuthorsController@destroy');
