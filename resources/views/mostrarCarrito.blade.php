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
              <form action="{{url('/realizarCompra')}}/{{ $venta }}" method='POST'>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" name="id" value="{{$venta}}">
                                  <br>
                                      <input type="submit" value="Realizar compra" class="btn btn-primary">
                            </form > 
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
                    <?PHP $total=0; $totalf=0?>
                        <tbody>
                            @foreach($ventas as $ven)
                                <tr>
                                    <td>{{$ven->codigo}}</td>
                                    <td>{{$ven->precio}}</td>
                                    <td>{{$ven->descripcion}}</td>
                                    <td>{{$ven->fecha}}</td>
                                    <td>{{$ven->canti}}</td>
                                    <td>{{$ven->precio * $ven->canti}}</td>
                                    <td>
                                        <a href="" data-target="#{{$ven->artid}}" data-toggle="modal" data-id="{{ $ven->id }}">
                                          <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Agregar</button>
                                        </a>
                                        <form action="{{ url('/eliminarProductoCarrito') }}/{{ $ven->id }}/{{ $ven->artid }}" method="POST" style="display:inline;">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" id="id" name="id">
                                          <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span> Quitar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!--Modal-->
                                <div id="{{$ven->artid}}" class="modal fade" role="dialog">
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
                                          <form action="{{url('/agregarProCarrito')}}/{{$ven->id}}/{{$ven->artid}}" method='POST'>
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
                                <?PHP 
                                $total=$total+ ($ven->precio * $ven->canti);
                                ?>
                            @endforeach
                        </tbody>
                </table>
            </div> 
            <?PHP $totalf= ($total*0.16)+($total)+100;?>
            <b>COSTO ENVIO: $ 100.00</b><br>
            <b>SUBTOTAL:    {{$total}} </b><br>
            <b>TOTAL:       {{$totalf}}</b>
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