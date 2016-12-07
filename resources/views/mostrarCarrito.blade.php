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
              <h1>Mostrar carrito</h1><br>   
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><font color="white">Código</font></th>
                            <th><font color="white">Precio</font></th>
                            <th><font color="white">Descripción</font></th>
                            <th><font color="white">Fecha</font></th>
                            <th><font color="white">Cantidad</font></th>
                            <th><font color="white">Pago</font></th>
                            <th><font color="white">Opciones</font></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($ventas as $ven)
                                <tr>
                                    <td>{{$ven->codigo}}</td>
                                    <td>{{$ven->precio}}</td>
                                    <td>{{$ven->descripcion}}</td>
                                    <td>{{$ven->fecha}}</td>
                                    <td>{{$ven->canti}}</td>
                                    <td>{{$ven->pago}}</td>
                                    <td>
                                        <a href="" data-target="{{$ven->artid}}" data-toggle="modal" data-id="{{ $ven->id }}">
                                          <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Agregar</button>
                                        </a>
                                        <form action="{{ url('/eliminarProducto') }}" method="POST" style="display:inline;">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" id="id" name="id">
                                          <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span> Quitar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!--Modal-->
                                <div id="{{$ven->artid}}" class="modal fade" data-id="{{ $ven->id }} {{ $ven->artid }}"role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-success">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <font color="white">
                                         <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-plus"></span><font color="white">&nbsp;Agregar</font></h4>
                                        </font>
                                      </div>
                                      <div class="modal-body">
                                          <b>Introduzca la cantidad de a agregar:</b><br><br>
                                          <div align="center">
                                          <form action="{{url('/agregarProCarrito')}}/{{$ven->id}}" method='POST'>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="">
                                            <input name="agregar" type="text" class="form-control" placeholder="Cantidad" required pattern="[0-9]*">
                                            <br>
                                            <input type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{url('/mostrarCompra')}}/{{$ven->artid}}" class="btn btn-danger" align="center">Cancelar</a>
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
            <b>COSTO ENVIO:</b><br>
            <b>SUBTOTAL:</b><br>
            <b>TOTAL:</b>
            <form action="{{url('/eliminarProInv')}}" method='POST'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="">
                  <br>
                      <input type="submit" value="Realizar compra" class="btn btn-primary">
            </form >
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