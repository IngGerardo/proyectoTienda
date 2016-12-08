<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\articulos;
use App\articulosxventa;
use App\categorias;
use App\ventas;
use DB;

class ventasController extends Controller
{
    public function mostrarCarrito($idArt)
	{
		$articulo= new articulosxventa();
		$articulo->cantidad=1;
		$articulo->id_articulos=$idArt;
		$articulo->id_ventas=1;
		$articulo->id_user=auth()->user()->id;
		$articulo->save();

		$venta=1;

		$categorias = categorias::all();
		$ventas = DB::table('articulos')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulosxventa.id_user', '=', auth()->user()->id)
		->where('ventas.finalizado', '=', 0)
		->get();

		return view('mostrarCarrito',compact('ventas','categorias','venta'));
	}
	public function carrito()
	{
		$categorias = categorias::all();
		$venta=1;
		$ventas = DB::table('articulos')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulosxventa.id_user', '=', auth()->user()->id)
		->where('ventas.finalizado', '=', 0)
		->get();

		return view('mostrarCarrito',compact('ventas','categorias','venta'));
	}
	public function agregarProducto($id, $idart, Request $request)
	{
		$categorias = categorias::all();
		$agregarPro = DB::table('articulos')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion')
		->where('articulosxventa.id','=',$id)
		->where('articulos.cantidad', '>', 0)		
		->where('ventas.finalizado', '=', 0)
		->first();
        $valor=$request->input('agregar');
        $agre=$agregarPro->canti + $valor;
		$valor=DB::table('articulosxventa')	
		->where('id', '=', $id)	
		->update(['cantidad' => $agre]);
		 return Redirect('/mostrarCompra/');
	}

	public function eliminarProCarrito($id, $idart){

    	articulosxventa::find($id)->delete();

        return Redirect('/mostrarCompra/');
    }
    public function realizarCompra(Request $request){
    	$valor=DB::table('articulosxventa')	
    	->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->where('ventas.id', '=', $request->input('id'))	
		->update(['ventas.finalizado' => 1]);

        return Redirect('/mostrarFinalizarCompra/');
    }
    public function mostrarFinalizarCompra()
	{
		$categorias = categorias::all();
		$ventas = DB::table('articulos')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulosxventa.id_user', '=', auth()->user()->id)
		->where('ventas.finalizado', '=', 1)
		->get();
		return view('mostrarFinalizarCompra',compact('ventas','categorias'));
	}
	public function detalleCompra()
	{
		$ventas = DB::table('articulos')
		->join('articulosxventa','articulos.id','=', 'articulosxventa.id_articulos')
		->join('ventas','ventas.id','=', 'articulosxventa.id_ventas')
		->select('articulos.cantidad','articulosxventa.cantidad as canti','ventas.fecha','ventas.pago',
			     'articulosxventa.id','articulos.codigo','articulos.precio','articulos.descripcion', 'articulos.id as artid')
		->where('articulosxventa.id_user', '=', auth()->user()->id)
		->where('ventas.finalizado', '=', 1)
		->get();

		$vista=view('detalleCompra', compact('ventas'));
    	$dompdf=\App::make('dompdf.wrapper');
    	$dompdf->loadHTML($vista);
    	return $dompdf->stream('detalleCompra.pdf');
	}
}