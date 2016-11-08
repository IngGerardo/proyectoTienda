@extends ('master')

@section ('encabezado')
<script type="text/javascript"> document.getElementById("email").value="";</script>
@stop

@section ('contenido')

			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Bienvenido, Registrate!</h3>
  				    </div>
  			 	         <div class="panel-body">
					<form action="{{url('/guardarUsuario')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
						</div>
						<div class="form-group">
							<label for="apellido_paterno">Primer Apellido:</label>
							<input name="apellido_paterno" type="text" class="form-control" placeholder="primer apellido" required>
						</div>
						<div class="form-group">
							<label for="apellido_materno">Segundo Apellido:</label>
							<input name="apellido_materno" type="text" class="form-control" placeholder="segundo apellido" required>
						</div>
						<div class="form-group">
							<label for="telefono">Telefono:</label>
							<input name="telefono" type="number" class="form-control" placeholder="Telefono" required>
						</div>
						<div class="form-group">
							<label for="email">email:</label>
							<input id="email" name="email" type="email" class="form-control" placeholder="ejemplo@correo.com">
						</div>
						<div class="form-group">
							<label for="contraseña">Contraseña:</label>
							<input id="contraseña" name="contraseña"  class="form-control" placeholder="contraseña" required pattern=".{6,}" title="Seis caracteres o mas">
						</div>
						
						<input type="submit" value="Registrar" class="btn btn-primary" align="center">
						<a href="{{url('/')}}" class="btn btn-danger" align="center">Cancelar</a>
					</form>
					</div>
				</div>
			</div>

@stop