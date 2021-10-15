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
	
	function sumar($n1,$n2) //parámetros por valor
	{
		$n1= $n1 + $n2;
		return $n1;// devolve este valor 
	}
	function sumar2(&$n1,&$n2) //parámetros por referencia
	{
		$n1= $n1 + $n2;
		return $n1;// devolve este valor 
	}

	echo "<br>5 + 10 suman ".sumar(5,10);//estamos chamando á función para que se execute
	echo "<br>15 + 66 suman ".sumar(15,66);//estamos chamando á función para que se execute
	echo "<br>25 + 10 suman ".sumar(25,10);//estamos chamando á función para que se execute
	$a=100;
	$b=50;
	echo "<br>$a + $b suman ".sumar($a,$b);
	echo "<br>despois da f. sumar \$a:$a , \$b:$b";

	echo "<br>$a + $b suman ".sumar2($a,$b);
	echo "<br>despois da f. sumar2 \$a:$a , \$b:$b";

	
	//funcións con parámetros por defecto:

	function facerCafe($tipo="con leite",$tamano="normal")
	{
		echo "<p>Facer un café $tipo de tamaño $tamano</p>";

	}


	facerCafe();
	facerCafe("solo largo");
	facerCafe("cortado","grande");

	//función con número variable de parámetros.

	function sumaMultiple() {

		$numeros=func_get_args();//devolve os parámetros nun array
		$numeroParametros=count($numeros);
		$suma=0;
		echo "<p> sumar os seguintes $numeroParametros números: ";
		foreach ($numeros as $valor) {
			echo "$valor ";
			$suma+=$valor;
		}
		echo "</p>";
		return $suma;
	}

	echo sumaMultiple();
	echo sumaMultiple(1,2);
	echo sumaMultiple(1,2,3);
	echo sumaMultiple(1,2,3,4);
	echo sumaMultiple(1,2,3,4,5,6,7,8,9,10,11,12);







?>	
</body>
</html>