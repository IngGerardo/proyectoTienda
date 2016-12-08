<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF WebShopOnline</title>

<style type="text/css">

.imag{
	background-color: white;
}

.encabezado{
	color: white;
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

tr:nth-child(even){background-color: #f2f2f2}

</style>

		<table >
				<tbody> 
					<tr>
					<th><div class=""><a href=""><img src="images/Online-shop.jpg" width="1500%" align="center" class="img-responsive imagen carta"></a></div></th>
				</tr>
				</tbody> 
		</table> 
</head>
<body>
	<div> 
              <h1>Compra finalizada</h1><br>   
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Pago</th>
                        </tr>
                    </thead> 
                    <?PHP $total=0; $totalf=0?>
                        <tbody>
                            @foreach($ventas as $ven)
                                <tr>
                                    <td>{{$ven->codigo}}</td>
                                    <td>{{$ven->precio}}</td>
                                    <td>{{$ven->descripcion}}</td>
                                    <td>{{$ven->fecha}}</td>
                                    <td>{{$ven->canti}}</td>
                                    <td>{{$ven->precio * $ven->canti}}</td>
                                </tr>
                                <?PHP 
                                $total=$total+ ($ven->precio * $ven->canti);
                                ?>
                            @endforeach
                        </tbody>
                </table>   
	</div>
	<footer>
		<center><font FACE="sans-serif"><p>PDF webShopOnline &copy; 2016</p></font></center>
</footer>
</body>
</html>