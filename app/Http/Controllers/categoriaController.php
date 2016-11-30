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

    public function like($id,$idp){
        $cate = categorias::all();
        $arti = DB::table('articulos')
        ->select('articulos.likee as puntos')
        ->where('id', '=', $id)
        ->first();

        $ca='1';

        $pol=$arti->puntos + $ca;

        $ite=DB::table('articulos')
        ->where('id', $id)     
        ->update(['likee' => $pol]);
        
        return redirect('/categorias/'.$idp);

    }

    public function dislike($id,$idp){
        $cate = categorias::all();
        $arti = DB::table('articulos')
        ->select('articulos.dislike as punto')
        ->where('id', '=', $id)
        ->first();

        $ca='1';

        $pol=$arti->punto + $ca;

        $ite=DB::table('articulos')
        ->where('id', $id)     
        ->update(['dislike' => $pol]);
        
        return redirect('/categorias/'.$idp);

    }
}
