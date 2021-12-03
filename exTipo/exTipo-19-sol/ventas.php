<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ventas 2019</title>
<style type="text/css">
  ._nombre {
  	text-align: center;
  	color:red;

  }
  td {border: 1px solid #000;}
	.centro {text-align:center;}
	.dcha {text-align:right;}
	.co {background-color: yellow;}
	.lu {background-color: lime;}
	.ou {background-color: tomato;}
	.po {background-color: lightblue;}

	table {
		width: 450px;
		margin: 0 auto;
	}
	#contenedor {
		width: 90%;
		margin:0 auto;
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
	//nombre meses     0     1        2        3       4       5       6      7       8         9           10         11          12

	$vProv = array('A Coruña' => 0 ,'Lugo' => 0 ,'Ourense' => 0 ,'Pontevedra' => 0 );
	$cProv = array('A Coruña' => "co" ,'Lugo' => "lu" ,'Ourense' => "ou" ,'Pontevedra' => "po");

	$totalVentasCo=0;
	$totalVentasLu=0;
	$totalVentasOu=0;
	$totalVentasPo=0;

	//          0  1  2  3  4  5  6  7  8  9  10 11 12
	$n=0; // para ir contando el número de líneas que muestro en la tabla
	$fichero="ventas.csv";
	$cursor=@fopen($fichero,"r") or die ("<br>Error al abrir el fichero $fichero"); 
	$linea=fgets($cursor);
	while (!feof($cursor)) { //mientras no es fin de fichero tratamos la información
	  $registro=explode(";",$linea); //separo cada campo en array $registro (nif y provincia) 
		$fecha=$registro[0]; 
		$importe=$registro[1]; 
		$provincia=$registro[2];
		
		$vProv[$provincia]+=$importe;

		$color=$cProv[$provincia];	 
/*		
		$color="";
		if($provincia=="A Coruña") {
			$color="co";
			$totalVentasCo+="$importe";
		}
		elseif ($provincia=="Lugo") {
			$color="lu";
			$totalVentasLu+="$importe";
		}
		elseif ($provincia=="Ourense") {
			$color="ou";
			$totalVentasOu+="$importe";
		}
		elseif ($provincia=="Pontevedra") {
			$color="po";
			$totalVentasPo+="$importe";
		}
*/		

		$n++;   // cuento una línea
		echo "<tr class='$color'>\n";
		echo "\t<td class='centro'>$n</td>\n"; //número de línea
		echo "\t<td class='centro'>$fecha</td>\n"; //fecha tal cual está en el fichero de ventas
		echo "\t<td class='dcha'>$importe € </td>\n"; //Provincia
		echo "\t<td class='centro'>$provincia</td>\n"; //Provincia
		echo "</tr>\n";
		
	  $linea=fgets($cursor);  // leemos el siguiente nif
	}

	fclose($cursor);

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
	$color="class='gris'";
	$totalventas=0; //iniciamos el acumulador total de ventas
	foreach ($vProv as $nomProv => $ventaProv) {
	  $color=$cProv[$nomProv];	 
	  echo "<tr class='$color'>\n";
	  echo "\t<td class='centro'>$nomProv</td>\n";
	  echo "\t<td class='dcha'>$ventaProv € </td>\n";
	  echo "</tr>\n";
		$totalventas+=$ventaProv; //vamos acumulando las ventas de cada mes

	}
	  echo "<tr>\n";
	  echo "\t<th class='centro'>T O T A L E S</th>\n";
	  echo "\t<th class='dcha'>$totalventas €</th>\n";
	  echo "</tr>\n";

	 ?>
	</table>

<!-- 	</table>
	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ventas 2019</h1></caption>
	<tr>
	   <th>Provincia</th>
	   <th>Importe</th>
	</tr>
	<tr class="co">
		<td class='centro'>A Coruña</td>
		<td class='dcha'> <?php echo $totalVentasCo  ?> € </td>
	</tr>
	<tr class="lu">
		<td class='centro'>Lugo</td>
		<td class='dcha'> <?php echo $totalVentasLu  ?> € </td>
	</tr>
	<tr class="ou">
		<td class='centro'>Ourense</td>
		<td class='dcha'> <?php echo $totalVentasOu  ?> € </td>
	</tr>
	<tr class="po">
		<td class='centro'>Pontevedra</td>
		<td class='dcha'> <?php echo $totalVentasPo  ?> € </td>
	</tr>
	<tr>
		<th class='centro' >T O T A L E S </th>
		<th class='dcha'> <?php echo $totalVentasPo+$totalVentasOu+$totalVentasLu+$totalVentasCo  ?> </th>
	</tr>
 -->
</div> 
</body>
</html>
