@extends('master')

@section('encabezado')
  <style>
    .encabezado{
        color: black;
        background-color: #8eef8b;
    }

      table{
      width: 100%;
    }
    table, th, td { 
        padding: 1px;
        border-collapse: collapse;
        text-align: center;
        
    }
    th, td {
        padding: 5px;
    }

    th{
      background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even){background-color: #f2f2f2}

</style>

@stop

@section('contenido')
 <div class="container">
            <br>
              <h1>Mostrar inventario</h1>   
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><font color="white">#</font></th>
                            <th><font color="white">Articulo</font></th>
                            <th><font color="white">Cantidad</font></th>
                            <th><font color="white">Opciones</font></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($articulo as $inv)
                                <tr>
                                    <td>{{$inv->id}}</td>
                                    <td>{{$inv->descripcion}}</td>
                                    <td>{{$inv->cantidad}}</td>
                                    <td>
                                        <a href="" data-target="#{{$inv->id}}a" data-toggle="modal" data-id="{{ $inv->id }}">
                                          <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Agregar</button>
                                        </a>
                                        <a href="" data-target="#{{$inv->id}}" data-toggle="modal" data-id="{{ $inv->id }}">
                                          <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-erase"></span> Borrar</button>
                                        </a>
                                        <form action="{{ url('/eliminarProducto') }}/{{$inv->id}}" method="POST" style="display:inline;">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" id="id" name="id">
                                          <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span>Quitar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!--Modal-->
                              <div id="{{ $inv->id }}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-success">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <font color="white">
                                         <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-erase"></span><font color="white">&nbsp;Borrar</font></h4>
                                        </font>
                                      </div>
                                      <div class="modal-body">
                                          <b>Introduzca la cantidad de "{{ $inv->descripcion }}" a borrar:</b><br><br>
                                          <div align="center">
                                          <form action="{{url('/eliminarProInv')}}/{{$inv->id}}" method='POST'>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{$inv->id}}">
                                            <input name="eliminar" type="text" class="form-control" placeholder="Cantidad" required pattern="[0-9]*">
                                            <br>
                                            <input type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{url('/inventario')}}" class="btn btn-danger" align="center">Cancelar</a>
                                          </form >
                                       </div>
                                              <!--contenido-->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div id="{{ $inv->id }}a" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-success">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <font color="white">
                                         <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-plus"></span><font color="white">&nbsp;Agregar</font></h4>
                                        </font>
                                      </div>
                                      <div class="modal-body">
                                          <b>Introduzca la cantidad de "{{ $inv->descripcion }}" a agregar:</b><br><br>
                                          <div align="center">
                                          <form action="{{url('/agregarProInv')}}/{{$inv->id}}" method='POST'>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{$inv->id}}">
                                            <input name="eliminar" type="text" class="form-control" placeholder="Cantidad" required pattern="[0-9]*">
                                            <br>
                                            <input type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{url('/inventario')}}" class="btn btn-danger" align="center">Cancelar</a>
                                          </form >
                                       </div>
                                              <!--contenido-->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>


      
<script type="text/javascript">
      $(document).ready(function(){
      $('[data-toggle="modal"]').tooltip();
      $('#data').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id');
            var descripcion = button.data('descripcion');

            var modal = $(this)
            modal.find('.modal-body #id').val(id)

            $('#imagen').html("<img src='../img/"+ id+".png' width='100%' class='img-responsive imagen carta'>");
            $('#descripcion').html(descripcion);

            });
      $('#dataagregar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id');
            var descripcion = button.data('descripcion');

            var modal = $(this)
            modal.find('.modal-body #id').val(id)

            $('#imagen').html("<img src='../img/"+ id+".png' width='100%' class='img-responsive imagen carta'>");
            $('#descripcion').html(descripcion);

            });
			});
		</script>
@stop