<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/RegistroUsuario','usuarioController@registrarUsuarios');

Route::post('/guardarUsuario','usuarioController@guardarUsuario');

Route::get('/','articulosController@categorias');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/categorias/{id}','articulosController@articuloxcategoria');
Route::get('/categoriash/{id}','articulosController@articuloxcategoriah');

/*Route::get('/', function () {
    return view('principal');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index');
