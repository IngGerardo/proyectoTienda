<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\usuarios;
use App\categorias;

class usuarioController extends Controller
{
    public function registrarUsuarios()
	{
		$categorias = categorias::all();
		return view('registroUsuarios' , compact('categorias'));
	}

	public function guardarUsuario(Request $request){
		$nuevo= new usuarios();
    	$nuevo->nombre=$request->input('nombre');
    	$nuevo->apellido_paterno=$request->input('apellido_paterno');
    	$nuevo->apellido_materno=$request->input('apellido_materno');
    	$nuevo->telefono=$request->input('telefono');
    	$nuevo->email=$request->input('email');
    	$nuevo->contraseña=$request->input('contraseña');
    	$nuevo->save();

	}
}

