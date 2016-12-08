<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\articulos;
use App\articulosxventa;
use App\categorias;
use App\inventarios;
use App\ventas;
use DB;

class ventasController extends Controller
{
    public function mostrarCarrito($idv)
	{
		$categorias = categorias::all();
		$ventas = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulosxventa.id', '=', $idv)
		->where('articulos.cantidad', '>', 0)
		->where('ventas.finalizado', '=', 0)
		->get();
		return view('mostrarCarrito',compact('ventas','categorias'));
	}
	public function agregarProducto($id, $idart, Request $request)
	{
		$categorias = categorias::all();
		$agregarPro = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion')
		->where('articulosxventa.id','=',$id)
		->where('articulos.cantidad', '>', 0)		
		->where('ventas.finalizado', '>', 0)
		->first();
        $valor=$request->input('agregar');
        $agre=$agregarPro->canti + $valor;

		$valor=DB::table('articulosxventa')	
		->where('id', '=', $id)	
		->update(['cantidad' => $agre]);

		 return Redirect('/mostrarCompra/'.$idart);

	}
	public function eliminarProCarrito($id, $idart){
    	articulosxventa::find($id)->delete();

        return Redirect('/mostrarCompra/'.$idart);
    }
    public function realizarCompra($idv, $idart){
    	$valor=DB::table('articulosxventa')	
    	->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->where('articulosxventa.id', '=', $idv)	
		->update(['ventas.finalizado' => 0]);

        return Redirect('/mostrarFinalizarCompra/'.$idart);
    }
    public function mostrarFinalizarCompra($idv)
	{
		$categorias = categorias::all();
		$ventas = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulos.cantidad', '>', 0)
		->where('ventas.finalizado', '=', 1)
		->get();
		return view('mostrarFinalizarCompra',compact('ventas','categorias','idv'));
	}
	public function detalleCompra($idv)
	{
		$ventas = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulos.cantidad', '>', 0)
		->where('ventas.finalizado', '=', 1)
		->get();

		$vista=view('detalleCompra', compact('ventas'));
    	$dompdf=\App::make('dompdf.wrapper');
    	$dompdf->loadHTML($vista);
    	return $dompdf->stream('detalleCompra.pdf');
	}
}