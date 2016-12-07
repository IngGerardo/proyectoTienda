<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\articulos;
use App\categorias;
use Excel;
use Illuminate\Support\Facades\Input;

class ExcelController extends Controller
{
    public function importarExcel(){


    	Excel::load(Input::file('importar'),function($reader){
			$reader->each(function($sheet){
				articulos::firstOrCreate($sheet->toArray());
			});
	});
	return redirect('/importarCSV')->with('csv', '¡Su csv se ha procesado con éxito!');
}

public function registraArticulos()
    {
       
	$categorias = categorias::all();
	return view('registrarArticulos' , compact('categorias'));
	}

	public function importarCSV()
    {
       
	$categorias = categorias::all();
	return view('importarCSV' , compact('categorias'));
	}
}

					