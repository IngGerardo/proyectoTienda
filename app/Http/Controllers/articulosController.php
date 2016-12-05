<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\categorias;
use App\cat_articulo;
use App\articulos;



class articulosController extends Controller
{
    
public function categorias(){
	$categorias = categorias::all();
		return view('principal', compact('categorias'));


}
public function editar(){
	$categorias = categorias::all();
	$articulos = articulos::all();
		return view('editarArticulos', compact('categorias','articulos'));
}
public function guardarArticulos(Request $request){
	$nuevo= new articulos();
    	$nuevo->codigo=$request->input('codigo');
    	$nuevo->precio=$request->input('precio');
    	$nuevo->descripcion=$request->input('descripcion');
    	$nuevo->tipo=$request->input('tipo');
    	$nuevo->save();
}



public function articuloxcategoria($id)
	{	
		$categorias = categorias::all();
		$articulo = DB::table('categorias')
		->join('cat_articulo','cat_articulo.id_categoria','=', 'categorias.id')
		->join('articulos','cat_articulo.id_articulo','=','articulos.id')
        ->select('categorias.nombre as categoriaNombre','categorias.id as categoriaId','articulos.descripcion','articulos.id','articulos.precio', 'articulos.tipo','articulos.likee','articulos.dislike')
        ->where('categorias.id', '=', $id)
        ->where('articulos.tipo', '=', '1')
        
        
        ->get();

        $cate=DB::table('categorias')->where('id','=',$id)->select('nombre')->first();

        $cates=categorias::all();

		return view('categoriasarticulos',compact('articulo','cates','cate', 'categorias'));
	}


public function articuloxcategoriah($id)
	{	
		$categorias = categorias::all();
		$articulo = DB::table('categorias')
		->join('cat_articulo','cat_articulo.id_categoria','=', 'categorias.id')
		->join('articulos','cat_articulo.id_articulo','=','articulos.id')
        ->select('categorias.nombre as categoriaNombre','categorias.id as categoriaId','articulos.descripcion','articulos.id','articulos.precio', 'articulos.tipo','articulos.likee','articulos.dislike')
        ->where('categorias.id', '=', $id)
        ->where('articulos.tipo', '=', '2')
        
        
        ->get();

        $cate=DB::table('categorias')->where('id','=',$id)->select('nombre')->first();

        $cates=categorias::all();

		return view('categoriasarticulos',compact('articulo','cates','cate', 'categorias'));
	}

}

