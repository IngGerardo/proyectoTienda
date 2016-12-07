@extends('master')

@section('encabezado')
	
@stop

@section('contenido')
<br>
<div class="container">
<div class="row">	
<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Editar Articulos</h3>
  				    </div>
  				    <div class="panel-body">
	<form action="{{url('/actualizarA')}}/{{$a->id}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<label for="codigo">Código</label>
			<input type="text" class="form-control" name="codigo" required value="{{$a->codigo}}">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="number" class="form-control" name="precio" required value="{{$a->precio}}">
		</div>

		<div class="form-group">
			<label for="cantidad">Cantidad</label>
			<input type="number" class="form-control" name="cantidad" required value="{{$a->cantidad}}">

		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<input type="text" class="form-control" name="descripcion" required value="{{$a->descripcion}}">
		</div>
		
		<div class="form-group">
			<label for="tipo">Tipo</label>
			<input type="number" class="form-control" name="tipo" required value="{{$a->tipo}}">
		</div>
		<input type="submit" class="btn btn-primary" value="Actualizar">
		<a href="{{url('/editarArticulos')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
	</div>
	</div>
	</div>
	</div>
@stop
