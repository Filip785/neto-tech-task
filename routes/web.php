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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'countries'], function () use ($router) {
        $router->get('/', 'CountryController@index');
        $router->get('/{id}', 'CountryController@get');
    });

    $router->group(['prefix' => 'cards'], function () use ($router) {
        $router->get('/{id}', ['middleware' => 'auth', 'uses' => 'CardController@get']);
        $router->get('/{id}/balance', ['middleware' => 'auth', 'uses' => 'CardController@get_balance']);
        $router->get('/{id}/pin', ['middleware' => 'auth', 'uses' => 'CardController@get_pin']);
        $router->get('/{id}/history', ['middleware' => 'auth', 'uses' => 'CardController@get_history']);

        $router->post('/create', ['middleware' => 'auth', 'uses' => 'CardController@create']);

        $router->patch('/{id}/deactivate', ['middleware' => 'auth', 'uses' => 'CardController@deactivate']);
        $router->patch('/{id}/activate', ['middleware' => 'auth', 'uses' => 'CardController@activate']);
        $router->patch('/{id}/update_pin', ['middleware' => 'auth', 'uses' => 'CardController@update_pin']);
        $router->patch('/{id}/load_balance', ['middleware' => 'auth', 'uses' => 'CardController@load_balance']);
    });
});
