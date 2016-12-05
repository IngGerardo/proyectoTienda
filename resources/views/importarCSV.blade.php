@extends ('master')

@section ('encabezado')

@stop

@section ('contenido')

			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Importar Articulos</h3>
  				    </div>
  			 	    <div class="panel-body">
						<form action="{{url('/importar')}}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<label for="Importar">Importar:</label>
								<input name="importar" type="file" class="form-control">
							</div>
						<input type="submit" value="Importar" class="btn btn-primary" align="center">
						</form>	
					</div>
				</div>
			</div>

@stop