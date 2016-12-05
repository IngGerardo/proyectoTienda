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

.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}


</style>
<br>
<div class="container-fluid">
    <div class="row">
        @foreach($articulo as $a)
            <script type="text/javascript">
                  jQuery(document).ready(function($) {
             
                    $('#{{ $a->id }}').carousel({
                            interval: 5000
                    });
             
                    //Handles the carousel thumbnails
                    $('[id^=carousel-selector-]').click(function () {
                    var id_selector = $(this).attr("id");
                    try {
                        var id = /-(\d+)$/.exec(id_selector)[1];
                        console.log(id_selector, id);
                        jQuery('#{{ $a->id }}').carousel(parseInt(id));
                    } catch (e) {
                        console.log('Regex failed!', e);
                    }
                });
                    // When the carousel slides, auto update the text
                    $('#{{ $a->id }}').on('slid.bs.carousel', function (e) {
                             var id = $('.item.active').data('slide-number');
                            $('#carousel-text').html($('#slide-content-'+id).html());
                    });
            });
            </script>
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
                                        <div class="container">
                                            <div id="main_area">
                                                <!-- Slider -->
                                                <div class="row">
                                                    <div class="col-sm-5" id="slider-thumbs">
                                                        <!-- Bottom switcher of slider -->
                                                        <ul class="hide-bullets">
                                                            <li class="col-sm-6">
                                                                <a class="thumbnail" id="carousel-selector-0"><img src="../images/{{ $a->id }}.png" width="40%" class="img-responsive imagen carta">
                                                                </a>
                                                            </li>

                                                            <li class="col-sm-6">
                                                                <a class="thumbnail" id="carousel-selector-1"><img src="../images/{{ $a->id }}-1.png" width="40%" class="img-responsive imagen carta"></a>
                                                            </li>

                                                            <li class="col-sm-6">
                                                                <a class="thumbnail" id="carousel-selector-2"><img src="../images/{{ $a->id }}-2.png" width="40%" class="img-responsive imagen carta"></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="col-xs-12" id="slider">
                                                            <!-- Top part of the slider -->
                                                            <div class="row">
                                                                <div class="col-sm-10" id="carousel-bounding-box">
                                                                    <div class="carousel slide" id="{{ $a->id }}">
                                                                        <!-- Carousel items -->
                                                                        <div class="carousel-inner">
                                                                            <div class="active item" data-slide-number="0">
                                                                                <img src="../images/{{ $a->id }}.png"></div>

                                                                            <div class="item" data-slide-number="1">
                                                                                <img src="../images/{{ $a->id }}-1.png"></div>

                                                                            <div class="item" data-slide-number="2">
                                                                                <img src="../images/{{ $a->id }}-2.png"></div>

                                                                        </div>
                                                                        <!-- Carousel nav -->
                                                                        <a class="left carousel-control" href="#{{ $a->id }}" role="button" data-slide="prev">
                                                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                                        </a>
                                                                        <a class="right carousel-control" href="#{{ $a->id }}" role="button" data-slide="next">
                                                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/Slider-->
                                                </div>

                                            </div>
                                        </div>
                                        <!--    <p><img src="../images/{{ $a->id }}.png" width="40%" class="img-responsive imagen carta"></a>
                                            </p>
                                            <form action="{{ url('/agregarCompra') }}" method="POST" style="display:inline;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id="id" name="id">
                                                <button type="submit" class="btn btn-warning">Agregar al carrito <span class="fa fa-plus-circle" aria-hidden="true"></button>
                                                </form >-->
                                        
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
