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

//Dusterio\LumenPassport\LumenPassport::routes($app); //Rotas para o processo de autenticação
Dusterio\LumenPassport\LumenPassport::routes($app);

$app->get('/', function () use ($app) {
    //return $app->app->version();
    return view('teste');
});


$app->group(['prefix' => 'api/v1', 'namespace' => 'Api\V1'], function() use ($app){
    $app->get('restaurants/by-address', 'RestaurantsController@getByAddress');
    $app->get('restaurants/by-coords', 'RestaurantsController@getByCoords');
    $app->post('restaurants/vote', 'VotesController@store');
    $app->get('restaurants/{id:[0-9]+}/view-phone', 'RestaurantsController@viewPhone');



    $app->get('restaurants/{id:[0-9]+}', 'RestaurantsController@show'); //[0-9] + só aceita numero de 0 a 9 ou mais
    $app->get('dishes', 'dishesController@index');
    $app->get('restaurants/{id:[0-9]+}/photos', 'RestaurantPhotosController@index');

    $app->post('auth/register', 'AuthController@register');


    //TESTE DE DOWNLOAD SEM CREDENCIAIS
    //$app->get('restaurants/download', 'ExampleController@downloadExcel');
});

$app->group(['prefix' => 'api/v1', 'namespace' => 'Api\V1', 'middleware' => ['auth']], function() use ($app){

    $app->get('restaurants', 'RestaurantsController@index');

    $app->post('restaurants', 'RestaurantsController@store');
    $app->put('restaurants/{id:[0-9]+}', 'RestaurantsController@update');
    $app->post('restaurants/{id:[0-9]+}', 'RestaurantsController@update');
    $app->delete('restaurants/{id:[0-9]+}', 'RestaurantsController@destroy');

    $app->post('restaurants/{id:[0-9]+}/address', 'RestaurantsController@address');
    $app->post('restaurants/{id:[0-9]+}/upload', 'RestaurantsController@upload');


    $app->post('restaurants/photos', 'RestaurantPhotosController@store');
    $app->delete('restaurants/photos/{id:[0-9]+}', 'RestaurantPhotosController@destroy');

    // TESTE DE DOWNLOAD COM CREDENCIAIS
    $app->get('restaurants/download', 'ExampleController@downloadExcel');


    $app->get('dishes/{id:[0-9]+}', 'dishesController@show');
    $app->post('dishes', 'dishesController@store');
    $app->post('dishes/{id:[0-9]+}', 'dishesController@update');
    $app->delete('dishes/{id:[0-9]+}', 'dishesController@destroy');

    $app->get('auth/me', 'authController@me');
    $app->post('auth/change-password', 'authController@changePassword');
    $app->post('auth/change-profile', 'authController@changeProfile');
    $app->get('auth/logout', 'authController@logout');

});
