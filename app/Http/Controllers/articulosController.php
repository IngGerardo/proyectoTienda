<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categorias;


class articulosController extends Controller
{
    
public function categorias(){
	$categorias = categorias::all();
		return view('principal', compact('categorias'));


}

}

