@extends ('master')

@section ('encabezado')

@stop

@section ('contenido')
<br>
	<div class='container'>
		<div class='row'>
			<div class="col-xs-12">
				<div class="panel panel-primary">
					@if (session('csv'))
                          <div id="alert" class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>&times;</button>
                              <strong>{{ session('csv') }}</strong>
                          </div>
                    @endif
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
		</div>
	</div>	
	<script type="text/javascript">
            setTimeout(function() {
                $("#alert").fadeOut(2000);
            },4000);
     </script>
@stop