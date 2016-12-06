<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\articulos;
use App\inventario;
use DB;

class inventarioController extends Controller
{
     public function mostrarInv()
	{
		$articulo = DB::table('articulos')
		->join('inventario','inventario.id','=', 'articulos.id_inventario')
		->select('articulos.descripcion','articulos.id','inventario.cantidad')
        ->get();

		return view('mostrarInventario',compact('articulo'));
	}
	 public function agregarProInv($id, Request $request)
	{
		$agregarPro = DB::table('articulos')
		->join('inventario','inventario.id','=', 'articulos.id_inventario')
		->select('inventario.cantidad')
		->where('articulos.id', '=', $id)
		->first();
        $valor=$request->input('agregar');
        $agre=$agregarPro->cantidad + $request->input('agregar');
				
		$valor=DB::table('inventario')		
		->update(['cantidad' => $agre]);

        return Redirect('/inventario');

		return view('mostrarInventario',compact('articulo'));
	}
	public function eliminarProInv($id, Request $request){
        $eliminarPro = DB::table('articulos')
		->join('inventario','inventario.id','=', 'articulos.id_inventario')
		->select('inventario.cantidad')
		->where('articulos.id', '=', $id)
		->first();
        $valor=$request->input('eliminar');
        $eli=$eliminarPro->cantidad - $request->input('eliminar');
				
		$valor=DB::table('inventario')		
		->update(['cantidad' => $eli]);

        return Redirect('/inventario');
    }
    public function eliminarProducto($id){
    	$eliminar = DB::table('articulos')->delete();
		->join('inventario','inventario.id','=', 'articulos.id_inventario')
		->where('articulos.id', '=', $id)
		->delete();
        return Redirect('/poketipo/'.$idp);
    }
}
