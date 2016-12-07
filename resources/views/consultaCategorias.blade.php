@extends ('master')

@section ('encabezado')
    <br />
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
@stop

@section('contenido')
        <div class="container">
            <br>
            <div align="right">
            <a href="{{url('registroCategorias')}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Categoria</button></a></div>
            <h1>Categorias Registradas</h1>   
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><font color="white">#</font></th>
                            <th><font color="white">Nombre</font></th>
                            <th><font color="white">Opcion</font></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($Categoriasp as $u)
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
                {!! $Categoriasp->render() !!}
            </div>
        </div>
@stop