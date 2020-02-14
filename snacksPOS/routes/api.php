<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




 //USER
Route::group(['prefix' => 'v1'], function ($router) {

    Route::resource('v1', 'UserController');


    //Route::post('register','UserController@register');
    Route::post('register', 'UserController@register');

    //Route::post('login', 'UserController@login');

    Route::post('login',[
        'uses'=>'UserController@login'
    ]);

    Route::get('profile', 'UserController@getAuthenticatedUser');



    Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
    });


});

  //PRODUCTO
  Route::post('registrarProducto', 'ProductoController@registrarProducto');

  //Venta
  Route::post('crearVenta', 'VentaController@crearVenta');


  Route::post('terminarVenta', 'VentaController@terminarVenta');
