<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>php básico</title>
</head>
<body>
	<h1>PHP Básico</h1>
	<!-- comentario html -->
	<?php

    echo "\n\t<p>párrafo 1</p>"; //comentario, remata por se mesmo ao final da liña
    echo "\n\t<p>párrafo 2</p>";

/*  permite comentar varias liñas
	  echo "<p>párrafo 3</p>"; 
	  echo "<p>párrafo 4</p>";
*/

	# comentario tamén para unha liña
	$temperatura=22; //declaramos a variable $temperatura con valor numérico 18

	if ($temperatura>20) {
	  	echo "\n\t<p>";
	  	echo "Temperatura supera os 20 graos";
	  	echo "</p>";
	}  


	//variables:

	$valor1=0; //a variable valor1 e de tipo enteiro 

	$valor2=0.4; //a variable valor2 e de tipo real 

	$texto="texto de proba"; //a variable texto de de tipo cadea (string)

	$valor3=$valor1; // asignamos á varialbe valor3 o valor da variable valor1, 
					 // é unha asignación POR VALOR

	$valor4=&$valor1; // asignamos á varialbe valor4 o valor da variable valor1 pero por REFERENCIA, comparten o mesmo espacio de memoria (son a mesma variable)


	echo "<p>";
	echo "\$valor1 > $valor1<br/>";
	echo "\$valor2 > $valor2<br/>";
	echo "\$valor3 > $valor3<br/>";
	echo "\$valor4 > $valor4<br/>";
	echo "\$texto > $texto<br/>";
	echo "<p>";


	$valor1=2;

	echo "<p>";
	echo "\$valor1 > $valor1<br/>";
	echo "\$valor2 > $valor2<br/>";
	echo "\$valor3 > $valor3<br/>";
	echo "\$valor4 > $valor4<br/>";
	echo "\$texto > $texto<br/>";
	echo "<p>";

	$valor4=4;

	echo "<p>";
	echo "\$valor1 > $valor1<br/>";
	echo "\$valor2 > $valor2<br/>";
	echo "\$valor3 > $valor3<br/>";
	echo "\$valor4 > $valor4<br/>";
	echo "\$texto > $texto<br/>";
	echo "<p>";


	?>



</body>
</html>