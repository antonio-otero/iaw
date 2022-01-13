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
	#contenedor {
		width: 90%;
		margin:0 auto;
	}
	table {
		width: 450px;
		margin: 0 auto;
	}
  td {border: 1px solid #000;}
	.centro {text-align:center;}
	.dcha {text-align:right;}
	.co {background-color: lime;}
	.lu {background-color: lightblue;}
	.ou {background-color: yellow;}
	.po {background-color: tomato;}	
	.gris {background-color: lightgrey;}
	.blanco {background-color: white;}

	.nomeProvincia {background-color: black; color: white;}

</style>
</head>
<body>
<div id="contenedor">	
	<h3 class="_nombre">Pon aquí tu nombre</h3>
	<table >
	<caption><h1>Informe Ingresos/Gastos 2020</h1></caption>
	<tr>
	   <th>Nº Línea</th>
	   <th>Fecha</th>
	   <th>Ingresos</th>
	   <th>Gastos</th>
	   <th>Provincia</th>
	</tr>
	<?php 
			//código que genera las filas de la tabla de ingresos/gastos
//nombre meses     0     1        2        3       4       5       6      7       8         9           10         11          12

	$cProv = array('A Coruña' => "co" ,'Lugo' => "lu" ,'Ourense' => "ou" ,'Pontevedra' => "po");


	$nomeMeses=array("","Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo","Agosto","Setembro","Outubro","Novembro","Decembro");

	$iMes = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
	$gMes = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
	//            0,1,2,3,4,5,6,7,8,9,0,1,2  
	//                                1 1 1 

	$iProv = array(
									'A Coruña' 	=> 0,
									'Lugo'			=> 0,
									'Ourense'		=> 0,
									'Pontevedra'=> 0
			 					);
	$gProv = array(
									'A Coruña' 	=> 0,
									'Lugo'			=> 0,
									'Ourense'		=> 0,
									'Pontevedra'=> 0
			 					);

	//$iProvMes['A Coruña'][1];//Ingresos de enero de 'A Coruña';

	$iProvMes = array(
										'A Coruña' 		=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Lugo' 				=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Ourense' 		=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Pontevedra' 	=> array(0,0,0,0,0,0,0,0,0,0,0,0) 
									);
	$gProvMes = array(
										'A Coruña' 		=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Lugo' 				=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Ourense' 		=> array(0,0,0,0,0,0,0,0,0,0,0,0), 
										'Pontevedra' 	=> array(0,0,0,0,0,0,0,0,0,0,0,0) 
									);

	$n=0; // para ir contando el número de líneas que muestro en la tabla
	$fichero="ingresos-gastos-2020.csv";
	$cursor=@fopen($fichero,"r") or die ("<br>Error al abrir el fichero $fichero"); 
	$linea=fgets($cursor);
	while (!feof($cursor)) { //mientras no es fin de fichero tratamos la información
	  $registro=explode(";",$linea); //separo cada campo en array $registro (fecha, ing, gast, prov) 

		list($fecha,$ingresos,$gastos,$provincia)=$registro;
		
		$color=$cProv[$provincia];	 //calculamos color da provincia

		//acumulamos ventas mes, con array estandard, con índices numéricos
		$mes= (int) substr($fecha, 3, 2); //02/01/19, a partir da posición 3, 2 caracteres = mes
		$iMes[$mes]+=$ingresos;
		$gMes[$mes]+=$gastos;

		$iProv[$provincia]+=$ingresos;
		$gProv[$provincia]+=$gastos;

		$iProvMes[$provincia][$mes-1]+=$ingresos;
		$gProvMes[$provincia][$mes-1]+=$gastos;


		$n++;   // cuento una línea
		echo "<tr class='$color'>\n";
		echo "\t<td class='centro'>$n</td>\n"; //número de línea
		echo "\t<td class='centro'>$fecha</td>\n"; //fecha tal cual está en el fichero de ventas
		echo "\t<td class='dcha'>$ingresos € </td>\n"; //Provincia
		echo "\t<td class='dcha'>$gastos € </td>\n"; //Provincia
		echo "\t<td class='centro'>$provincia</td>\n"; //Provincia
		echo "</tr>\n";
		
	  $linea=fgets($cursor);  // leemos el siguiente nif
	}

	fclose($cursor);

	//var_dump($iProvMes);
	//echo "<hr>";
	//var_dump($gProvMes);

	 ?>
	</table>

<!-- ----------------------------------------------------------------- -->

	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ingresos/gastos 2020 por mes</h1></caption>
	<tr>
	   <th>Mes</th>
	   <th>Ingresos</th>
	   <th>Gastos</th>
	   <th>Neto</th>
	</tr>
	<?php 
		//código que genera las filas de la tabla resumen ingresos/gastos


	$tot_I=0; //iniciamos el acumulador total de ingresos
	$tot_G=0; //iniciamos el acumulador total de gastos
	$color="gris"; //color da primeira fila
	for ($nMes=1;$nMes <=12;$nMes++) {
		echo "<tr class='$color'>\n";
	  echo "\t<td class='centro'>$nomeMeses[$nMes]</td>\n";
	  echo "\t<td class='dcha'>$iMes[$nMes] € </td>\n";
	  echo "\t<td class='dcha'>$gMes[$nMes] € </td>\n";
	  $neto=$iMes[$nMes]-$gMes[$nMes];
	  echo "\t<td class='dcha'>$neto € </td>\n";
	  echo "</tr>\n";
		$tot_I+=$iMes[$nMes];//acumulo todos os ingresos de todos os meses
		$tot_G+=$gMes[$nMes];//acumulo todos os gastos de todos os meses
		$color=$color=="gris"?"blanco":"gris";
	}
	  echo "<tr>\n";
	  echo "\t<th class='centro'>T O T A L E S</th>\n";
	  echo "\t<th class='dcha'>$tot_I €</th>\n";
	  echo "\t<th class='dcha'>$tot_G €</th>\n";
	  $tot_N=$tot_I-$tot_G;
	  echo "\t<th class='dcha'>$tot_N €</th>\n";
	  echo "</tr>\n";

	 ?>	
	 
	</table>


	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ingresos/gastos 2020 por provincia</h1></caption>
	<tr>
	   <th>Provincia</th>
	   <th>Ingresos</th>
	   <th>Gastos</th>
	   <th>Neto</th>
	</tr>
	<?php 
		//código que genera las filas de la tabla resumen ingresos/gastos


	$tot_I=0; //iniciamos el acumulador total de ingresos
	$tot_G=0; //iniciamos el acumulador total de gastos
	$color="gris"; //color da primeira fila
	foreach ($iProv as $provincia => $ingresos) {
		echo "<tr class='$color'>\n";
	  echo "\t<td class='centro'>$provincia</td>\n";
	  echo "\t<td class='dcha'>$ingresos € </td>\n";
	  echo "\t<td class='dcha'>$gProv[$provincia] € </td>\n";
	  $neto=$ingresos-$gProv[$provincia];
	  echo "\t<td class='dcha'>$neto € </td>\n";
	  echo "</tr>\n";
		$tot_I+=$ingresos;//acumulo todos os ingresos de todos os meses
		$tot_G+=$gProv[$provincia];//acumulo todos os gastos de todos os meses
		$color=$color=="gris"?"blanco":"gris";
	}
	  echo "<tr>\n";
	  echo "\t<th class='centro'>T O T A L E S</th>\n";
	  echo "\t<th class='dcha'>$tot_I €</th>\n";
	  echo "\t<th class='dcha'>$tot_G €</th>\n";
	  $tot_N=$tot_I-$tot_G;
	  echo "\t<th class='dcha'>$tot_N €</th>\n";
	  echo "</tr>\n";

	 ?>	
	 
	</table>



	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ingresos/gastos 2020 por provincia y mes</h1></caption>
	<tr>
	   <th>Provincia</th>
	   <th>Mes</th>
	   <th>Ingresos</th>
	   <th>Gastos</th>
	   <th>Neto</th>
	</tr>
	<?php 
		//código que genera las filas de la tabla resumen ingresos/gastos


	$tot_I=0; //iniciamos el acumulador total de ingresos
	$tot_G=0; //iniciamos el acumulador total de gastos
	$color="gris"; //color da primeira fila
	foreach ($iProvMes as $provincia => $ingresosMes) {
		foreach ($ingresosMes as $nMes => $ingresos) {
				echo "<tr class='$color'>\n";
			  echo "\t<td class='centro'>$provincia</td>\n";
			  echo "\t<td class='centro'>".$nomeMeses[$nMes+1]."</td>\n";
			  echo "\t<td class='dcha'>$ingresos € </td>\n";
			  echo "\t<td class='dcha'>{$gProvMes[$provincia][$nMes]} € </td>\n";
			  $neto=$ingresos-$gProvMes[$provincia][$nMes];
			  echo "\t<td class='dcha'>$neto € </td>\n";
			  echo "</tr>\n";
				$tot_I+=$ingresos;//acumulo todos os ingresos de todos os meses
				$tot_G+=$gProvMes[$provincia][$nMes];//acumulo todos os gastos de todos os meses
				$color=$color=="gris"?"blanco":"gris";
		}
	}
	  echo "<tr>\n";
	  echo "\t<th class='centro' colspan='2'>T O T A L E S</th>\n";
	  echo "\t<th class='dcha'>$tot_I €</th>\n";
	  echo "\t<th class='dcha'>$tot_G €</th>\n";
	  $tot_N=$tot_I-$tot_G;
	  echo "\t<th class='dcha'>$tot_N €</th>\n";
	  echo "</tr>\n";

	 ?>	
	 
	</table>


	<p>&nbsp;</p>
	<table >
	<caption><h1>Resumen ingresos/gastos 2020 por provincia y mes (v.2)</h1></caption>
	<tr>
	   <th>Mes</th>
	   <th>Ingresos</th>
	   <th>Gastos</th>
	   <th>Neto</th>
	</tr>
	<?php 
		//código que genera las filas de la tabla resumen ingresos/gastos


	$tot_I=0; //iniciamos el acumulador total de ingresos
	$tot_G=0; //iniciamos el acumulador total de gastos
	$color="gris"; //color da primeira fila
	foreach ($iProvMes as $provincia => $ingresosMes) {
				$tot_I_P=0;//iniciamos el acumulador total de ingresos por provincia
				$tot_G_P=0;//iniciamos el acumulador total de gastos por provincia
				echo "<tr class='nomeProvincia'>\n";
			  echo "\t<th colspan='4' class='centro'>$provincia</td>\n";
			  echo "</th>\n";
				foreach ($ingresosMes as $nMes => $ingresos) {
						echo "<tr class='$color'>\n";
			  		echo "\t<td class='centro'>".$nomeMeses[$nMes+1]."</td>\n";
			  		echo "\t<td class='dcha'>$ingresos € </td>\n";
			  		echo "\t<td class='dcha'>{$gProvMes[$provincia][$nMes]} € </td>\n";
			  		$neto=$ingresos-$gProvMes[$provincia][$nMes];
			  		echo "\t<td class='dcha'>$neto € </td>\n";
			  		echo "</tr>\n";
						$tot_I_P+=$ingresos;//acumulo todos os ingresos de todos os meses
						$tot_G_P+=$gProvMes[$provincia][$nMes];//acumulo todos os gastos de todos os meses
						$color=$color=="gris"?"blanco":"gris";
				}
			  echo "<tr class='nomeProvincia'>\n";
			  echo "\t<th class='centro' >TOTAL $provincia</th>\n";
			  echo "\t<th class='dcha'>$tot_I_P €</th>\n";
			  echo "\t<th class='dcha'>$tot_G_P €</th>\n";
			  $tot_N=$tot_I_P-$tot_G_P;
			  echo "\t<th class='dcha'>$tot_N €</th>\n";
			  echo "</tr>\n";

			  echo "<tr><td colspan='4'> </td></tr>";//fila de separación
				$tot_I+=$tot_I_P;
				$tot_G+=$tot_G_P;
	}
	  echo "<tr>\n";
	  echo "\t<th class='centro'>T O T A L E S</th>\n";
	  echo "\t<th class='dcha'>$tot_I €</th>\n";
	  echo "\t<th class='dcha'>$tot_G €</th>\n";
	  $tot_N=$tot_I-$tot_G;
	  echo "\t<th class='dcha'>$tot_N €</th>\n";
	  echo "</tr>\n";

	 ?>	
	 
	</table>




</div> 
</body>
</html>
