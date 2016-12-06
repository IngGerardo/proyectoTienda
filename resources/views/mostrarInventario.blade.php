<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Inventario</title>

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
      <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
      <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
      <script src="{{asset("js/jquery.min.js")}}"></script>
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
      <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
      <script src="{{asset("js/bootstrap.min.js")}}"></script>
     <script src="{{ asset("js/jquery.min.js") }}"></script>
     <script src="{{ asset("js/main.js") }}"></script>
<!--search jQuery-->
<script src="{{ asset("js/responsiveslides.min.js") }}"></script>
<style>
    .encabezado{
        color: black;
        background-color: #8eef8b;
    }

        table{
      width: 100%
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

</head>
    <body>
        <div class="container">
            <br>
            <div align="right">
            <h1>Mostrar inventario</h1>   
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($articulo as $inv)
                                <tr>
                                    <td>{{$inv->id}}</td>
                                    <td>{{$inv->descripcion}}</td>
                                    <td>{{$inv->cantidad}}</td>
                                    <td>
                                        <a href="#"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Agregar productos</button></a></div>
                                        <a href="" data-target="#dataeliminar" data-toggle="modal" data-id="{{ $inv->id }}" title="{{ $inv->descripcion }}">Modal</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!--Modal-->
        <div class="portfolio-modal modal fade slideanim" id="dataeliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="imagesIndex/pic4.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $(document).ready(function(){
      $('[data-toggle="modal"]').tooltip();
      $('#dataEliminar').on('show.bs.modal', function (event) {
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
    </body>
</html>
