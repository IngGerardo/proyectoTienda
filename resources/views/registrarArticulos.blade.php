@extends ('master')

@section ('encabezado')

@stop

@section ('contenido')
<br>
<div class='container'>
	<div class='row'>
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Registrar Articulos</h3>
  				    </div>
  			 	         <div class="panel-body">
					<form action="{{url('/guardarArticulos')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="codigo">Codigo:</label>
							<input name="codigo" type="text" class="form-control" placeholder="Codigo" required>
						</div>
						<div class="form-group">
							<label for="precio">Precio:</label>
							<input name="precio" type="number" class="form-control" placeholder="precio" required>
						</div>
						<div class="form-group">
							<label for="descripcion">Descripcion:</label>
							<input name="descripcion" type="text" class="form-control" placeholder="descripcion" required>
						</div>
						<div class="form-group">
							<label for="tipo">Tipo:</label>
							<input name="tipo" type="number" class="form-control" placeholder="Tipo">
						</div>
						<input type="submit" value="Registrar" class="btn btn-primary" align="center">
						<a href="{{url('/')}}" class="btn btn-danger" align="center">Cancelar</a>
					</form>
					</div>
				</div>
			</div>
		</div>
</div>

@stop