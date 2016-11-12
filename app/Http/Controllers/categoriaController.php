<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\categorias;

class categoriaController extends Controller
{
     public function guardar(Request $datos){
    	$nuevo = new categorias();
    	$nuevo->nombre=$datos->input('nombre');
    	$nuevo->save();

    	return Redirect('/consultaCategorias');
    }

    public function consultar(){
        $Categorias=DB::table('categorias')->paginate(6);
    	return view('consultaCategorias', compact('Categorias'));
    }

    public function eliminar($id){
        categorias::find($id)->delete();
        return Redirect('/consultaCategorias');
    }
}
