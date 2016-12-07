@extends ('master') @section ('encabezado') @stop @section ('contenido')
    <br>
    <div class='container'>
    <div class='row'>
<div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title" align="center">Moderar Comentarios</h3>
                    </div>
                    <div class="panel-body">
    <table class="table table-hover">
            <tr>
              <th>Usuario</th>
              <th>Comentario</th>
              <th>Eliminar</th>
            </tr>
          </thead>

        @foreach($comentarios as $C)
          <tbody>
            <tr>
              <td>{{$C->usuario}}</td>
              <td>{{$C->coment}}</td>
              <td><a href="{{url('/eliminarComentario')}}/{{$C->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a></td>
            </tr>
          </tbody>
          @endforeach
        </table>

    </div>
    
@stop
