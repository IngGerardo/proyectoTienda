<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\categorias;
use App\cat_articulo;
use App\articulos;
use App\comentarios;
use App\User;


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


        $comentarios= DB::table('comentarios')
        ->join('users','comentarios.id_user','=','users.id')
        ->join('articulos','comentarios.id_arti','=','articulos.id')
        ->join('cat_articulo','cat_articulo.id_articulo','=', 'articulos.id')
        ->select('comentarios.comentario as coment','users.nombre as usuario','articulos.id as ide')
        ->where('cat_articulo.id_categoria', '=', $id)
        ->get();

        $cate=DB::table('categorias')->where('id','=',$id)->select('nombre')->first();

        $cates=categorias::all();

        return view('categoriasarticulos',compact('articulo','cates','cate', 'categorias','comentarios'));
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

        $comentarios= DB::table('comentarios')
        ->join('users','comentarios.id_user','=','users.id')
        ->join('articulos','comentarios.id_arti','=','articulos.id')
        ->join('cat_articulo','cat_articulo.id_articulo','=', 'articulos.id')
        ->select('comentarios.comentario as coment','users.nombre as usuario','articulos.id as ide')
        ->where('cat_articulo.id_categoria', '=', $id)
        ->get();

        $cate=DB::table('categorias')->where('id','=',$id)->select('nombre')->first();

        $cates=categorias::all();

        return view('categoriasarticulos',compact('articulo','cates','cate', 'categorias','comentarios'));
	}


public function actualizarArticulo($id)
    {
    	$categorias = categorias::all();
    	$a = articulos::find($id);
        return view('actualizarArticulo', compact('a', 'categorias'));
    }

public function actualizarArticuloEd($id, Request $datos)
    {
        $articulo = articulos::find($id);
            	$articulo->codigo=$datos->input('codigo');
            	$articulo->precio=$datos->input('precio');
                $articulo->cantidad=$datos->input('cantidad');
            	$articulo->descripcion=$datos->input('descripcion');
            	$articulo->tipo=$datos->input('tipo');
            	$articulo->save();
            	return Redirect('/editarArticulos');

    }


public function eliminarA($id)
    {
            articulos::find($id)->delete();
            return Redirect('/editarArticulos');
    }

public function comenta(Request $datos)
    {
        $nuevo = new comentarios();
        $nuevo->id_user=auth()->user()->id;
        $nuevo->id_arti=$datos->input('id');
        $nuevo->comentario=$datos->input('comentario');
        $nuevo->save();
                    
        if($datos->input('tipo')==1)
            return Redirect('/categorias/'.$datos->input('categoriaId'));
        else
            return Redirect('/categoriash/'.$datos->input('categoriaId'));
    }

public function comentar()
    {
            $categorias = categorias::all();
            $comentarios= DB::table('comentarios')
            ->join('users','comentarios.id_user','=','users.id')
            ->join('articulos','comentarios.id_arti','=','articulos.id')
            ->join('cat_articulo','cat_articulo.id_articulo','=', 'articulos.id')
            ->select('comentarios.comentario as coment','users.nombre as usuario','articulos.id as ide','comentarios.id')
            ->get();

            return view('comentarioss', compact('comentarios','categorias'));
    }

public function eliminarC($id)
    {
            comentarios::find($id)->delete();
            return Redirect('/comentarioss');
    }

public function consulmas()
    {
        $categorias = categorias::all();
        $articulo = DB::table('articulos')
        ->select('articulos.descripcion','articulos.precio','articulos.id','articulos.likee','articulos.dislike')
        ->orderby('created_at','DESC')
        ->take(4)
        ->get();

        return view('principal', compact('articulo','categorias'));
    }
}

