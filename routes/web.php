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

Route::get('/lkadmvkladnkvldana/{token}', 'HomeController@confirmRegister');

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

	/*Route::get('/registroCategorias', function () {
	    return view('registroCategorias');
	});*/
	
	Route::get('/registroCategorias','categoriaController@regcat');

	Route::post('/guardarCategoria','categoriaController@guardar');

	Route::get('/consultaCategorias','categoriaController@consultar');

	Route::get('/eliminarCategorias/{id}','categoriaController@eliminar');

	Route::get('/eliminarCategorias/{id}','categoriaController@eliminar');

	

	Route::get('/RegistroUsuario','usuarioController@registrarUsuarios');

	Route::post('/guardarUsuario','usuarioController@guardarUsuario');

	Route::get('/like/{id}/{categoriaId}','categoriaController@like');

	Route::get('/dislike/{id}/{categoriaId}','categoriaController@dislike');

	Route::post('/guardarcomentario','articulosController@comenta');

	Route::get('/comentarioss','articulosController@comentar');

	Route::get('/eliminarComentario/{id}', 'articulosController@eliminarC');

	Route::post('/importar','ExcelController@importarExcel');
	Route::post('/actualizarCatArticulo/{id}','categoriaController@actualizarCatArticulo');
	Route::get('/registraArticulos','ExcelController@registraArticulos');
	Route::get('/importarCSV','ExcelController@importarCSV');
	Route::get('/editarArticulos', 'articulosController@editar');
	Route::get('/asignarCategoria/{id}', 'categoriaController@asignarCategoria');

	Route::post('/actualizarA/{id}', 'articulosController@actualizarArticuloEd');
	Route::get('/actualizarArticulo/{id}','articulosController@actualizarArticulo');
	Route::post('/guardarArticulos','articulosController@guardarArticulos');
	Route::get('/eliminarArticulo/{id}', 'articulosController@eliminarA');
	Route::get('/inventario','inventarioController@mostrarInv');
	Route::post('/eliminarProInv/{id}','inventarioController@eliminarProInv');
	Route::post('/agregarProInv/{id}','inventarioController@agregarProInv');
	Route::post('/eliminarProducto/{id}','inventarioController@eliminarProducto');

	Route::any('/mostrarCompra/{idArt}','ventasController@mostrarCarrito');
	Route::any('/mostrarCompra','ventasController@carrito');
	Route::any('/eliminarProductoCarrito/{idv}/{idart}','ventasController@eliminarProCarrito');
	Route::any('/agregarProCarrito/{id}/{idart}','ventasController@agregarProducto');
	Route::any('/realizarCompra/{id}','ventasController@realizarCompra');
	Route::any('/mostrarFinalizarCompra','ventasController@mostrarFinalizarCompra');
	Route::any('/detalleCompra','ventasController@detalleCompra');
});

	Route::get('/categoriash/{id}','articulosController@articuloxcategoriah');
	Route::get('/categorias/{id}','articulosController@articuloxcategoria');
	Route::get('/', 'articulosController@consulmas');
	Route::get('/', 'articulosController@consulmasP');


