<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funcións en PHP</title>
</head>
<body>
	<h1>Funcións en PHP</h1>

<?php 
	
	function sumar($n1,$n2)
	{
		$resultado= $n1 + $n2;
		return $resultado;// devolve este valor 
	}

	echo "<p>5 + 10 suman ".sumar(5,10);//estamos chamando á función para que se execute
	echo "<p>15 + 66 suman ".sumar(15,66);//estamos chamando á función para que se execute
	echo "<p>25 + 10 suman ".sumar(25,10);//estamos chamando á función para que se execute

?>	
</body>
</html>