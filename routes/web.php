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

    // these will have to have authentication
    $router->group(['prefix' => 'cards'], function () use ($router) {
        $router->get('/{id}', 'CardController@get');
        $router->get('/{id}/balance', 'CardController@get_balance');
        $router->get('/{id}/pin', 'CardController@get_pin');
        $router->get('/{id}/history', 'CardController@get_history');

        $router->post('/create', 'CardController@create');

        $router->get('/{id}/deactivate', 'CardController@deactivate');
        $router->get('/{id}/activate', 'CardController@activate');
        $router->get('/{id}/update_pin', 'CardController@update_pin');
        $router->get('/{id}/load_balance', 'CardController@load_balance');
    });
});
