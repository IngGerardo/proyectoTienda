@extends ('master') @section ('encabezado') @stop @section ('contenido')
<style type="text/css">
    .ec-stars-wrapper {
    display: inline-block;
}
.ec-stars-wrapper a {
    text-decoration: none;
    display: inline-block;
    font-size: 32px;
    font-size: 2rem;
    
    color: #888;
}

.ec-stars-wrapper:hover a {
    color: rgb(255, 246, 89);
}
.ec-stars-wrapper > a:hover ~ a {
    color: #888; 
}

</style>
<br>
<div class="container-fluid">
    <div class="row">
        @foreach($articulo as $a)
        <div class="col-md-4" align="center">
            <div class="form-group">
                <a href="" data-target="#{{ $a->id }}" data-toggle="modal" data-descripcion="{{ $a->descripcion }}" data-precio="{{ $a->precio }}"
                    title="{{ $a->descripcion }}">
            <img src="../images/{{ $a->id }}.png" width="50%" class="img-responsive imagen carta"></a>
            <a href="{{url('/like')}}/{{ $a->id }}/{{ $a->categoriaId }}" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> {{ $a->likee }}</span></a>
            <a href="{{url('/dislike')}}/{{ $a->id }}/{{ $a->categoriaId }}" ><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"> {{ $a->dislike }}</span></a>
                <h4><b>Descripción</b></h4>
                <p>{{ $a->descripcion }}</p>
                <p><b>Precio:</b> ${{$a->precio}}.00</p>
            </div>
        </div>


        <div id="{{ $a->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <font color="white">
                            <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-copy"></span>
                                <p id="{{ $a->id }}" />
                            </h4>
                        </font>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12" align="left" style="text-align: justify; text-justify: inter-word;">
                                            <h4><b>Descripción</b></h4>
                                            <p>{{ $a->descripcion }}</p>
                                            <p>Precio: ${{$a->precio}}.00</p>
                                        </div>
                                        <div class="col-md-12" align="center">
                                            <p><img src="../images/{{ $a->id }}.png" width="40%" class="img-responsive imagen carta"></a>
                                            </p>
                                            <form action="{{ url('/agregarCompra') }}" method="POST" style="display:inline;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id="id" name="id">
                                                <button type="submit" class="btn btn-warning">Agregar al carrito <span class="fa fa-plus-circle" aria-hidden="true"></button>
                                                </form >
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    </div>
</div>





@stop
