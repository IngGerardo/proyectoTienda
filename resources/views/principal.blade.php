@extends ('master')

@section ('encabezado')
@stop

@section ('contenido')
<!--banner-->
<style>.fb_iframe_widget,
.fb_iframe_widget span,
.fb_iframe_widget span iframe[style] {
  min-width: 100% !important;
  width: 100% !important;
}</style>
		<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="images/b1.jpg" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="images/b2.jpg" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="images/b3.jpg" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="images/b4.jpg" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="css/coreSlider.css" rel="stylesheet" type="text/css">
			<script src="js/coreSlider.js"></script>
			<script>
			$('#example1').coreSlider({
			  pauseOnHover: false,
			  interval: 3000,
			  controlNavEnabled: true
			});

			</script>

		</div>	
		<!--banner-->
			<!--content-->
		<div class="content">
			<!--banner-bottom-->

	<div class="latest-w3">
				<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="images/p1.jpg" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Ropa para caballero</h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="images/p2.jpg" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Ropa para dama</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="images/p3.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Blusas</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="images/p4.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Accesorios</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">Nuevos artículos</h2>
						<div class="arrivals-grids">
						<div class="col-md-12">
								@foreach($articulo as $a)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													 <img src="images/{{ $a->id }}.png" width="50%" class="img-responsive imagen carta">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>Nuevo</p>
									</div>
									<div class="ribben1">
										<p>En Venta</p>
									</div>
									<div class="women">
										<div class="form-group col-xs-12">
										<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> {{ $a->likee }}</span>
            							</div>
										<h6>{{ $a->descripcion }}</h6>
										<p ><em class="item_price">${{ $a->precio }}.00</em></p>
										<a href="{{url('/mostrarCompra')}}/{{$a->id}}" data-text="Add To Cart" class="my-cart-b item_add">Agregar al Carrito</a>
									</div>
								</div>
								<br>
							</div>
								@endforeach
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				</div>
			<div class="accessories-w3l">
				<div class="container">
					<span>DISEÑOS EN TENDENCIA</span>
					<div class="button">
						<a href="{{url('/login')}}" class="button1"> Ingrese al sitio</a>
						<a href="#popu" class="button1"> Más Populares</a>
					</div>
				</div>
			</div>
			<div class="latest-w3">
			<br>
			<div class='container' align="center">
				<img  src="images/precios.png" class="img-responsive"  alt="">
			</div>
			</div>
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Últimas tendencias</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/l1.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Ropa caballero</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/l2.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Calzado caballero</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/c201.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Joyería caballero</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/l4.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Joyería dama</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/l5.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Accesorios dama</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="images/c200.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Calzado dama</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 id="popu" class="tittle">¡Mas Populares!</h2>
						<div class="arrivals-grids">
						<div class="col-md-12">
								@foreach($articulo2 as $a)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													 <img src="images/{{ $a->id }}.png" width="50%" class="img-responsive imagen carta">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>Nuevo</p>
									</div>
									<div class="ribben1">
										<p>En Venta</p>
									</div>
									<div class="women">
										<div class="form-group col-xs-12">
										<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> {{ $a->likee }}</span>
            							</div>
										<h6>{{ $a->descripcion }}</h6>
										<p ><em class="item_price">${{ $a->precio }}.00</em></p>
										<a href="{{url('/mostrarCompra')}}/{{$a->id}}" data-text="Add To Cart" class="my-cart-b item_add">Agregar al Carrito</a>
									</div>
								</div>
								<br>
							</div>
								@endforeach
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				</div>
			<!--new-arrivals-->
		</div>
		<div class="latest-w3">
		<div class="container" align="center">
                <div class="row">
                <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    </div>

                    <div class="fb-comments" data-href="https://www.facebook.com/starky.miranda" data-numposts="5"></div>
            </div>
            </div>
					<div class="footer-w3l">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4>Acerca </h4>
									<p style="text-align: justify">Ser la cadena de tiendas por departamentos en México que ofrezca la mejor calidad y variedad en 
									servicios de venta y productos a sus clientes, fortaleciendo nuestra solidez por medio de la planeación 
									y el trabajo en equipo.</p>
									<div class="social-icon" align="center">
										<a href="https://www.facebook.com/Webshoponline2/?skip_nax_wizard=true"><i class="icon"></i></a>
										<a href="https://twitter.com/WebShopOnlinee"><i class="icon1"></i></a>
									</div>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Mi cuenta</h4>
							@if (Auth::guest())
									<li><a href="{{url('/login')}}"><font color="white">Ingresar</font></a></li>
									<li><a href="{{url('/register')}}"><font color="white"> Crear una cuenta</font></a></li>
	                        @else
	                        		<li>
		                                    <a href="{{ url('/logout') }}"
		                                        onclick="event.preventDefault();
		                                        	document.getElementById('logout-form').submit();">
		                                    	<font color="white">Cerrar sesión</font>
		                                	</a>

		                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		                                    {{ csrf_field() }}
		                                </form>
		                            </li>
							@endif
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Información</h4>
									<ul>
										<li><a href="{{url('/categoriash/1')}}">Ropa caballero</a></li>
										<li><a href="{{url('/categoriash/2')}}">Calzado caballero</a></li>
										<li><a href="{{url('/categoriash/3')}}">Accesorios caballero</a></li>
										<li><a href="{{url('/categoriash/4')}}">Joyería caballero</a></li>
										<li><a href="{{url('/categorias/1')}}">Ropa dama</a></li>
										<li><a href="{{url('/categorias/2')}}">Calzado dama</a></li>
										<li><a href="{{url('/categorias/3')}}">Accesorios dama</a></li>
										<li><a href="{{url('/categorias/4')}}">Joyería dama</a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid foot">
									<h4>Contáctanos</h4>
									<ul>
										<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="https://www.google.com.mx/maps/place/Instituto+Tecnol%C3%B3gico+de+Culiacan/@24.7886019,-107.3989274,17z/data=!3m1!4b1!4m5!3m4!1s0x86bcd0c61991131b:0x918d0686e996a928!8m2!3d24.7886019!4d-107.3967387?hl=es" style="text-align: justify">Juan de Dios S/N, Guadalupe, 80220 Culiacán Rosales, Sin.</a></li>
										<li style="color: white"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>7-23-45-67</li>
										<li style="color: white"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>example@mail.com</li>
										
									</ul>
								</div>
							<div class="clearfix"> </div>
							</div>
							
						</div>
					</div>
					<!---footer-->
					<!--copy-->
					<div class="copy-section">
						<div class="container">
							<div class="copy-left">
								<p>WSOnline 2016 &copy; Todos los derechos reservados | <a href="{{url('/')}}">WebShopOnline</a></p>
							</div>
							<div class="copy-right">
								<img src="images/car.png" width="35px" height="35px" alt=""/>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
@stop