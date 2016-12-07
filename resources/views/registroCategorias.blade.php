<!DOCTYPE html>
@extends ('master') @section ('encabezado') @stop @section ('contenido')
<br>
        <div class="container">
            <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" align='center'>Registro de Categorias</h3>
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
@stop