<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
      <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
      <script src="{{asset("js/jquery.min.js")}}"></script>
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
      <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
      <script src="{{asset("js/bootstrap.min.js")}}"></script>
     
</head>
    <body>
        <div class="container">
            <h1>Registro de Categorias</h1>   
            <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categoria</h3>
                    </div>
                        <div class="panel-body">
                            <form action="{{url('/guardarCategoria')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input name="nombre"type="text" class="form-control" placeholder="nombre" required>
                                </div>

                                <input type="submit" value"Registrar" class="btn btn-primary">
                                <a href={{url('consultaCategorias')}} class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
