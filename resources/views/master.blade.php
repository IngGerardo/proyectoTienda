<!DOCTYPE HTML>
<html>
<head>
<title>WebShopOnline a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template</title>

<link rel="icon" type="image/x-icon" href="{{ asset("images/online.ico") }}"/> 
<!--css-->
<link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
<link  rel="stylesheet" href="{{ asset("css/style.css") }}">
<link  rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<!--search jQuery-->
	<script src="{{ asset("js/main.js") }}"></script>
<!--search jQuery-->
<script src="{{ asset("js/responsiveslides.min.js") }}"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{ asset("js/bootstrap-3.1.1.min.js") }}"></script>
 <!-- cart -->
<script src="{{ asset("js/simpleCart.min.js") }}"></script>
<!-- cart -->
  <!--start-rate-->
<script src="{{ asset("js/jstarbox.js") }}"></script>
	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8"  href="{{  asset("css/jstarbox.css") }}">
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<font color="white"> Asistencia telefónica  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> 7-23-45-67</font>
					</div>
					<div class="top-right">
					<ul>
			                @if (Auth::guest())
	                            <li><a href="{{ url('/login') }}">Login</a></li>
	                            <li><a href="{{ url('/register') }}">Registrar</a></li>
	                        @elseif(Auth::check() && auth()->user()->admin == 0)
			                	<li><a href="{{url('/mostrarFinalizarCompra')}}">Compras finalizadas</a></li>
	                            <li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                    {{ Auth::user()->nombre }} <span class="caret"></span>
	                                </a>

	                                <ul class="dropdown-menu" role="menu">
	                                    <li>
	                                        <a href="{{ url('/logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                            <font color="black">Logout</font>
	                                        </a>

	                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                        </form>
	                                    </li>
	                                </ul>
	                            </li>
	                        @elseif(Auth::check() && auth()->user()->admin == 1)
	                        	<li><a href="{{url('/registraArticulos')}}">Registrar Articulos</a></li>
								<li><a href="{{url('/editarArticulos')}}">Editar Articulos</a></li>
								<li><a href="{{url('/importarCSV')}}">Importar CSV</a></li>
								<li><a href="{{url('/inventario')}}">Inventario</a></li>
		                        <li><a href="{{url('/consultaCategorias')}}">Categorias</a></li>
		                        <li><a href="{{url('/comentarioss')}}">Comentarios</a></li>

		                        <li class="dropdown">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                    {{ Auth::user()->nombre }} <span class="caret"></span>
	                                </a>

	                                <ul class="dropdown-menu" role="menu">
	                                    <li>
	                                        <a href="{{ url('/logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                            <font color="black">Logout</font>
	                                        </a>

	                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                        </form>
	                                    </li>
	                                </ul>
	                            </li>
	                        @endif
					</ul>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="{{url('/')}}">WebShop <span align="center">Online</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{url('/')}}" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mujeres<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Categorias</h6>
														 @foreach ($categorias as $c)
														<li><a href="{{url('/categorias')}}/{{ $c->id }}">{{$c->nombre}}</a></li>
														 @endforeach
													</ul>
												</div>
					
												<div class="col-sm-3  multi-gd-img">
														<img src="{{ asset("images/woo.jpg") }}" alt=" "/>
												</div> 
												<div class="col-sm-3  multi-gd-img">
														<img src="{{ asset("images/woo1.jpg") }}" alt=" " />
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hombres <b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Categorias</h6>
														 @foreach ($categorias as $c)
									                    <li><a href="{{ url('/categoriash') }}/{{ $c->id }}"><b>{{$c->nombre}}</b></a></li>
									                    @endforeach
													</ul>
												</div>
													<div class="col-sm-3  multi-gd-img">
														<img src="{{ asset("images/woo3.jpg") }}" alt=" "/>
												</div> 
												<div class="col-sm-3  multi-gd-img">
														<img src="{{ asset("images/woo4.jpg") }}" alt=" "/>
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>			
								</ul>
							</div>
							
							</nav>
						</div>
						<div class="logo-nav-right">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
							<div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						@if(Auth::check() && auth()->user()->admin == 0)
						<div class="header-right2">
							<div class="cart box_1">
								<a href="{{url('/mostrarCompra')}}">
									<h3> <div class="total">
										<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> Articulos)</div>
										<img src="{{ asset("images/bag.png") }}" alt="" />
									</h3>
								</a>
								<p><a href="{{url('/mostrarCompra')}}" class="simpleCart_empty">Mostrar Carrito</a></p>
								<div class="clearfix"> </div>
							</div>	
						</div>
						@endif
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--header-->
            <div class="row">
                    @yield('encabezado')
            </div>

            <div class="row">
                    @yield('contenido')
            </div>
</body>
</html>