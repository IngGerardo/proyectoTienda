@extends('master')

@section('encabezado')
	
@stop

@section('contenido')
<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Editar Articulos</h3>
  				    </div>
  				    <div class="panel-body">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Código</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($articulos as $a)
				<tr>	
					<td>{{$a->id}}</td>
					<td>{{$a->codigo}}</td>
					<td>{{$a->precio}}</td>
					<td>{{$a->descripcion}}</td>
					<td>{{$a->tipo}}</td>
					<td>

							


						<a href=""   data-target="#{{ $a->id }}" class="btn btn-primary btn-xs" data-toggle="modal" data-descripcion="{{ $a->descripcion }}" data-precio="{{ $a->precio }}"
                    title="{{ $a->descripcion }}"><span class="glyphicon glyphicon-edit" aria-hidden="true">Categoria</span></a>
							 
	  
<div id="{{ $a->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <font color="white">
                            <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-copy"></span>
                                <p id="{{ $a->id }}" />
                            </h4>
                        </font>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12" align="left" style="text-align: justify; text-justify: inter-word;">
                                            <h4><b>Descripción</b></h4>
                                            <p>{{ $a->descripcion }}</p>
                                            <p>Precio: ${{$a->precio}}.00</p>
                                        </div>
                                        <div class="col-md-12" align="center">
                                           
                                            <form action="{{ url('/actualizarCatArticulo' )}}/{{ $a->id }}" method="POST" style="display:inline;">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <div class="form-group">
                                              <label for="sel1">Selecciona una categoria</label>
                                               <select class="form-control" id="sel1" name="categoria">
                                               @foreach($categorias as $c)
												  <option value="{{$c->id}}">{{$c->nombre}}</option>
												  @endforeach
												</select>
												</div>
												<br>
                                                <button type="submit" class="btn btn-warning">Agregar Categoria <span class="fa fa-plus-circle" aria-hidden="true"></button>
                                                </form >
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>




						<a href="{{url('/actualizarArticulo')}}/{{$a->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span></a>

						<a href="{{url('/eliminarArticulo')}}/{{$a->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a>
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>
	</div>
	</div>
	</div>

	

@stop