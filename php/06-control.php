<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Estruturas de Control</title>
	<style>
		table, th, td {
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Estruturas de Control</h1>
	<h3>if</h3>

<?php 
//if 
$a=-120;
if ($a==10) 
	echo "<br>$a=10";

//se só se executa unha sentenza, non é preciso usar chaves

if($a>5) {
	echo "<br>$a>5";
	echo " $a é maior que 5";
} else 
	echo "<br>$a non é maior que 5";

if ($a<0) 
	echo "<br>\$a é menor que 0";
elseif ($a<=4) 
	echo "<br>\$a está entre 0 e 4";
elseif ($a<=10)
	echo "<br>\$a está entre 4 e 10";
elseif ($a<=15)
	echo "<br>\$a está entre 10 e 15";
else 
	echo "<br>\$a é maior que  15";

?>

	<h3>switch</h3>

<?php
	$opcion=1;
	switch ($opcion) {
		case 1:
			echo "<br>opcion 1";
			// break;

			//se non poñemos break, se excuta o seguinte case aínda que o valor non se cumpla. 
			//so se remata se se atopa un break.
		case 2:
			echo "<br>opcion 2";
			break;
		case 3:
			echo "<br>opcion 3";
			break;
		default:
			echo "<br>opcion por defecto";
			break;
	}

?>	
	<h3>While</h3>
<?php
	
	$numero=1;

	while ($numero<=5) {
		echo "\n<br>$numero";
		$numero++;
	}

	echo "\n<br>\$numero ten valor $numero";


	//facemos o mesmo, pero xerando unha lista html desordenada:

	echo "\n<ul>";
	$numero=1;
	while($numero<=5) {
		echo "\n\t<li>$numero</li>";
		$numero++;
	}
	echo "\n</ul>";
?>	
	<h3>For</h3>
<?php
	echo "\n<ol>";
	for ($numero=1; $numero <= 5 ; $numero++) { 
		echo "\n\t<li>Elemento $numero</li>";
	}
	echo "\n</ol>";

?>
	<h3>Foreach</h3>
<?php
	$ingresos = array(
		'xan' => 1550,
		'feb' => 2200,
		'mar' => 2800,
		'abr' => 3000,
		'mai' => 3200,
		'xuñ' => 1500
	);

	//foreach simple , so para obter valores
	echo "<p>Ingresos primeiro semestre";
	foreach ($ingresos as $valor) {
		echo "\n<br>$valor €";
	}

	//foreach completo , para obter índices e valores
	$totalIngresos=0;
	echo "<p>Ingresos primeiro semestre";
	foreach ($ingresos as $mes => $valor) {
		echo "\n<br>$mes = $valor € ";
		$totalIngresos+=$valor;
		//var_dump($totalIngresos);
	}
	echo "\n<br>Total ingresos: $totalIngresos €";
?>

<table>
	<caption>Ingresos primeiro semestre</caption>
	<tr>
		<th>Mes</th>
		<th>Ingresos</th>
	</tr>
<?php 
	$totalIngresos=0;
	foreach ($ingresos as $nomeMes => $ingresosMes) {
		echo "\n\t<tr>";
		echo "\n\t\t<td>$nomeMes</td>";
		echo "\n\t\t<td>$ingresosMes €</td>";
		echo "\n\t</tr>";
		$totalIngresos+=$ingresosMes;
	}
	echo "\n\t<tr>";
	echo "\n\t\t<th>Total ingresos</th>";
	echo "\n\t\t<th>$totalIngresos €</th>";
	echo "\n\t</tr>";
	echo "\n</table>";
?>

	<h3>include e require</h3>
<?php
	include '01-basico.php';


?>	

 

















</body>
</html>