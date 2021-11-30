<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ventas 2019</title>
<style type="text/css">
	._nombre {text-align: center;color:red;}

	#contenedor {
		width: 90%;
		margin:0 auto;
	}
	table {
		width: 450px;
		margin: 0 auto;
	}	

</style>
</head>
<body>
<div id="contenedor">	
	<h3 class="_nombre">Pon aquí tu nombre</h3>
	<table >
	<caption><h1>Informe ventas 2019</h1></caption>
	<tr>
	   <th>Nº Línea</th>
	   <th>Fecha</th>
	   <th>Importe</th>
	   <th>Provincia</th>
	</tr>
	<?php 
		//código php que genera la tabla de las ventas


	 ?>
	</table>

	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ventas 2019</h1></caption>
	<tr>
	   <th>Provincia</th>
	   <th>Importe</th>
	</tr>

	<?php 
		//código php que genera la tabla resumen de ventas por provincia

	 ?>

	</table>

</div> 
</body>
</html>
