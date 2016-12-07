<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\articulos;
use App\articulosxventa;
use App\categorias;
use App\inventarios;
use DB;

class ventasController extends Controller
{
    public function mostrarCarrito()
	{
		$categorias = categorias::all();
		$ventas = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulos.cantidad', '>', 0)
		->get();
		return view('mostrarCarrito',compact('ventas','categorias'));
	}
	public function agregarProducto($id, Request $request)
	{
		$categorias = categorias::all();
		$agregarPro = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulos.codigo','articulos.precio','articulos.descripcion')
		->where('articulos.cantidad', '>', 0)
		->get();
		dd($agregarPro);
        $valor=$request->input('agregar');
        $agre=$agregarPro->cantidad + $request->input('agregar');
		$valor=DB::table('articulos')	
		->where('articulos.id', '=', $id)	
		->update(['cantidad' => $agre]);

        return Redirect('/inventario');

		return view('mostrarInventario',compact('articulo','categorias'));
	}
}
