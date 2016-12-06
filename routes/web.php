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

	

	Route::get('/RegistroUsuario','usuarioController@registrarUsuarios');

	Route::post('/guardarUsuario','usuarioController@guardarUsuario');

	Route::get('/like/{id}/{categoriaId}','categoriaController@like');

	Route::get('/dislike/{id}/{categoriaId}','categoriaController@dislike');


});


Route::post('/importar','ExcelController@importarExcel');
Route::post('/actualizarCatArticulo/{id}','categoriaController@actualizarCatArticulo');
Route::get('/registraArticulos','ExcelController@registraArticulos');
Route::get('/importarCSV','ExcelController@importarCSV');
Route::get('/editarArticulos', 'articulosController@editar');

Route::get('/asignarCategoria/{id}', 'categoriaController@asignarCategoria');

Route::get('/categorias/{id}','articulosController@articuloxcategoria');
Route::post('/actualizarA/{id}', 'articulosController@actualizarArticuloEd');
Route::get('/actualizarArticulo/{id}','articulosController@actualizarArticulo');
Route::get('/categoriash/{id}','articulosController@articuloxcategoriah');
Route::post('/guardarArticulos','articulosController@guardarArticulos');
Route::get('/eliminarArticulo/{id}', 'articulosController@eliminarA');

Route::get('/inventario','inventarioController@mostrarInv');
Route::get('/eliminarProInv/{id}','inventarioController@eliminarProInv');
Route::get('/agregarProInv','inventarioController@agregarProInv');