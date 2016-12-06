<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
	 public function agregarProInv()
	{
		$articulo = DB::table('articulos')
		->join('inventario','inventario.id','=', 'articulos.id')
		->select('articulos.descripcion','articulos.id','inventario.cantidad')
        ->get();

		return view('mostrarInventario',compact('articulo'));
	}
	public function eliminarProInv($id){
        inventario::find($id)->delete();
        return Redirect('/inventario');
    }
}
