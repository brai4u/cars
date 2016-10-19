<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/', 'HomeController@index');

/*Route::group(['middleware' => ['admin', 'vendedor']], function () {
    Route::get('/cars/addcars/vendedor', 'CarController@formcarsVendedor');
    Route::post('/cars', 'CarController@store');
    Route::get('/cars', 'CarController@index');
});*/

// rutas admins
Route::group(['middleware' => 'checkusertype:admin'], function () {
    Route::get('/addbrand/{msg?}', 'BrandController@index');
    Route::post('/addbrand', 'BrandController@store');
    Route::get('/cars/addcars/admin', 'CarController@formcarsAdmin');
    Route::get('/cars', 'CarController@index');
    Route::post('/cars', 'CarController@store');
    Route::get('/cars/addcars/vendedor', 'CarController@formcarsVendedor');
});


//rutas vendedores
Route::group(['middleware' => 'checkusertype:vendedor|admin'], function () {
    Route::get('/cars/addcars/vendedor', 'CarController@formcarsVendedor');
    Route::post('/cars', 'CarController@store');
    Route::get('/cars', 'CarController@index');
});




/*Route::get('/cars', 'CarController@index');
Route::get('show/{id}', 'CarController@show');

Route::get('/cars/addcars/admin', 'CarController@formcarsAdmin');
Route::get('/cars//addcars/vendedor', 'CarController@formcarsVendedor');
Route::post('/cars', 'CarController@store');
Route::get('db', 'CarController@llenardb');

Route::get('/addbrand/{msg?}', 'BrandController@index');
Route::post('/addbrand', 'BrandController@store');
Route::get('/cars/addcars/vendedor', 'CarController@formcarsVendedor');*/