<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template</title>

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
      <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
      <script src="{{asset("js/jquery.min.js")}}"></script>
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
      <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
      <script src="{{asset("js/bootstrap.min.js")}}"></script>
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
            <a href="{{url('registroCategorias')}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Categoria</button></a></div>
            <h1>Categorias Registradas</h1>   
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($Categorias as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->nombre}}</td>
                                    <td>
                                        <a href="{{url('/eliminarCategorias')}}/{{$u->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                {!! $Categorias->render() !!}
            </div>
        </div>
    </body>
</html>
