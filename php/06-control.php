<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Estruturas de Control</title>
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

	while ($numero<=8) {
		echo "<br>$numero";
		$numero++;
	}

	echo "<br>\$numero ten valor $numero";




?>	

</body>
</html>