<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prácticas estructuras control</title>
	<style>
	table {
		border: 1px solid grey;
		text-align: right;
	}

	.gris {
		background-color: lightgrey;
	}

</style>

</head>
<body>
	<h1>Prácticas estructuras control</h1>

	<?php
	
	$numero=9;

	echo "\n\t<table>";
	echo "\n\t\t<caption>Táboa de multiplicar do $numero</caption>";
	for ($i=1; $i <= 10 ; $i++) { 
		echo "\n\t\t<tr>";

		echo "\n\t\t\t<td>$numero</td>";
		echo "\n\t\t\t<td>x</td>";
		echo "\n\t\t\t<td>$i</td>";
		echo "\n\t\t\t<td>=</td>";
//		$resultado=$numero*$i;
//		echo "\n\t\t\t<td>$resultado</td>";
		echo "\n\t\t\t<td>".$numero*$i."</td>"; //equivalente ás duas liñas anteriores

		echo "\n\t\t</tr>";
	}
	echo "\n\t</table>";

//repetimos a táboa con while

	echo "\n\t<table>";
	echo "\n\t\t<caption>Táboa de multiplicar do $numero</caption>";
	$i=1;
	$color="gris";
	while ($i<=10) {

		echo "\n\t\t<tr class='$color'>";
		echo "\n\t\t\t<td>$numero</td>";
		echo "\n\t\t\t<td>x</td>";
		echo "\n\t\t\t<td>$i</td>";
		echo "\n\t\t\t<td>=</td>";
		//$resultado=$numero*$i;
		//echo "\n\t\t\t<td>$resultado</td>";
		echo "\n\t\t\t<td>".$numero*$i."</td>"; //equivalente ás duas liñas anteriores

		echo "\n\t\t</tr>";
		$i++;

		$color = $color=="" ? "gris" : "";
	}
	echo "\n\t</table>"


	?>


	
</body>
</html>