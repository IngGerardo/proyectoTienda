@extends ('master')

@section ('encabezado')

@stop

@section ('contenido')

	<div class="container-fluid">
<div class="row">
	@foreach($articulo as $a)
	<div class="col-md-4" align="center">
		<div class="form-group">
		<a href="" data-target="#dataPokemon" data-toggle="modal" data-id="{{ $a->id }}" data-descripcion="{{ $a->descripcion }}" data-nombrepokemon="{{ $a->precio }}" title="{{ $a->descripcion }}">
			
		</div>
	</div>
	@endforeach
</div>
</div>		

@stop