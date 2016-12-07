<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\articulos;
use App\inventarios;
use DB;

class inventarioController extends Controller
{
     public function mostrarInv()
	{
		$articulo = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->select('articulos.descripcion','articulos.id','articulos.cantidad')
        ->get();
		return view('mostrarInventario',compact('articulo'));
	}
	 public function agregarProInv($id, Request $request)
	{
		$agregarPro = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->select('articulos.cantidad')
		->where('articulos.id', '=', $id)
		->first();
        $valor=$request->input('agregar');
        $agre=$agregarPro->cantidad + $request->input('agregar');
		$valor=DB::table('articulos')	
		->where('articulos.id', '=', $id)	
		->update(['cantidad' => $agre]);

        return Redirect('/inventario');

		return view('mostrarInventario',compact('articulo'));
	}
	public function eliminarProInv($id, Request $request){
        $eliminarPro = DB::table('inventarios')
		->join('articulos','articulos.id','=', 'inventarios.id_articulo')
		->select('articulos.cantidad')
		->where('articulos.id', '=', $id)
		->first();
        $valor=$request->input('eliminar');
        $eli=$eliminarPro->cantidad - $request->input('eliminar');	
		
		$valor=DB::table('articulos')	
		->where('articulos.id', '=', $id)	
		->update(['cantidad' => $eli]);

        return Redirect('/inventario');
    }
    public function eliminarProducto($id){
    	articulos::find($id)->delete();
        return Redirect('/inventario');
    }
}
