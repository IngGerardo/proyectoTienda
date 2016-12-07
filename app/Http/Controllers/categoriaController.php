<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\categorias;
use App\cat_articulo;
use App\articulos;

class categoriaController extends Controller
{
     public function guardar(Request $datos){
    	$nuevo = new categorias();
    	$nuevo->nombre=$datos->input('nombre');
    	$nuevo->save();

    	return Redirect('/consultaCategorias');
    }

    public function consultar(){
        $categorias = categorias::all();
        $Categoriasp=DB::table('categorias')->paginate(6);
    	return view('consultaCategorias', compact('categorias','Categoriasp'));
    }

    public function regcat(){
        $categorias = categorias::all();
        return view('registroCategorias', compact('categorias'));
    }

    public function eliminar($id){
        categorias::find($id)->delete();
        return Redirect('/consultaCategorias');
    }

    public function like($id,$idp){
        $cate = categorias::all();
        $arti = DB::table('articulos')
        ->select('articulos.likee as puntos','articulos.tipo as tipo')
        ->where('id', '=', $id)
        ->first();

        $tipo=DB::table('articulos')
        ->select('articulos.tipo as tipo')
        ->where('id', '=', $id)
        ->first();

        $ca='1';

        $pol=$arti->puntos + $ca;

        $ite=DB::table('articulos')
        ->where('id', $id)     
        ->update(['likee' => $pol]);

        if($tipo->tipo==1)
            return Redirect('/categorias/'.$idp);
        else
            return Redirect('/categoriash/'.$idp);

    }

    public function dislike($id,$idp){
        $cate = categorias::all();
        $arti = DB::table('articulos')
        ->select('articulos.dislike as punto')
        ->where('id', '=', $id)
        ->first();

        $tipo=DB::table('articulos')
        ->select('articulos.tipo as tipo')
        ->where('id', '=', $id)
        ->first();

        $ca='1';

        $pol=$arti->punto + $ca;

        $ite=DB::table('articulos')
        ->where('id', $id)     
        ->update(['dislike' => $pol]);
        
        if($tipo->tipo==1)
            return Redirect('/categorias/'.$idp);
        else
            return Redirect('/categoriash/'.$idp);

    }

    public function asignarCategoria($id){
        $articulo=articulos::find($id);

        return view('asignarCatArt', compact('articulo'));
    
    }

    public function actualizarCatArticulo(Request $datos, $id){
            $cat_articulo = new cat_articulo();

            $existe = cat_articulo::where('id_articulo', '=', $id)->exists();
            if(!$existe){
                $cat_articulo->id_categoria=$datos->input('categoria');
                $cat_articulo->id_articulo=$id;   
                $cat_articulo->save();
                return back();
            }else{
                $actualizar = DB::table('cat_articulo')->where('id_articulo', '=', $id)->update(['id_categoria' => $datos->input('categoria')]);
                return back();

            }
            
            
    }
}
