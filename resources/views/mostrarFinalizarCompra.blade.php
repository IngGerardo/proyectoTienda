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
              <h1>Compra finalizada</h1><br>   
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
                                </tr>
                                <?PHP 
                                $total=$total+ ($ven->precio * $ven->canti);
                                ?>
                            @endforeach
                        </tbody>
                </table>
            </div> 
            <div class="col-xs-6">
              <?PHP $totalf= ($total*0.16)+($total)+100;?>
              <b>COSTO ENVIO: $ 100.00</b><br>
              <b>SUBTOTAL:    {{$total}} </b><br>
              <b>TOTAL:       {{$totalf}}</b>  
            </div>
            <div class="col-xs-6" align="right">
                                        <form action="{{ url('/detalleCompra') }}/{{ $idv }}" style="display:inline;">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" id="id" name="id">
                                          <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-ok"></span> Ver detalle</button>
                                        </form>
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