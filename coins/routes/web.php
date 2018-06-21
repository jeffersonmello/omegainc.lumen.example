<?php

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

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
  $router->get('coins',  ['uses' => 'CoinController@showAll']);
  $router->get('coins/{id}', ['uses' => 'CoinController@showOne']);
  $router->post('coins', ['uses' => 'CoinController@create']);
  $router->delete('coins/{id}', ['uses' => 'CoinController@delete']);
  $router->put('coins/{id}', ['uses' => 'CoinController@update']);
});
