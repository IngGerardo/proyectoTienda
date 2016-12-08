<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pdfController extends Controller
{
   public function pdf(Request $request)
	{
		
		$pokemon=DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
		->select('pokemones.id as id','pokemones.nombre as nombre', 'pokemones.descripcion as desc', 'pokemones.golpe as golpe', 'pokemones.peso as peso', 'pokemones.altura as altura', 'pokemones.cp as nivel','tipos.nombre as tipo')
		->where('pokemones.id', '=', $request->input('id'))
		->first();

		$tiposPok=DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
		->select('tipos.nombre as tipo')
		->where('pokemones.id', '=', $request->input('id'))
		->get();

    	$vista=view('pdfPokemon', compact('pokemon','tiposPok'));
    	$dompdf=\App::make('dompdf.wrapper');
    	$dompdf->loadHTML($vista);
    	return $dompdf->stream('pokemons.pdf');
		//echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso

	} //
}
