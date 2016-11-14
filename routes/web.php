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

Route::get('/','articulosController@categorias');

/*Route::get('/welcome', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return view('principal');
});
*/

Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'HomeController@admin');
});

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', 'HomeController@index');

	Route::get('/registroCategorias', function () {
	    return view('registroCategorias');
	});

	Route::post('/guardarCategoria','categoriaController@guardar');

	Route::get('/consultaCategorias','categoriaController@consultar');

	Route::get('/eliminarCategorias/{id}','categoriaController@eliminar');

	Route::get('/eliminarCategorias/{id}','categoriaController@eliminar');

	Route::get('/categorias/{id}','articulosController@articuloxcategoria');

	Route::get('/categoriash/{id}','articulosController@articuloxcategoriah');

	Route::get('/RegistroUsuario','usuarioController@registrarUsuarios');

	Route::post('/guardarUsuario','usuarioController@guardarUsuario');

});



