<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Datas en PHP</title>
</head>
<body>
	<h1>Datas e tempos en PHP</h1>
<?php 

//	setlocale(LC_ALL, "spanish");
	setlocale(LC_ALL, "galician");
	echo "<br>Instante Unix actual : ".time();
	echo strftime("<br>Hoxe é %A, %e de %B de %Y");
	$hora=strftime("%H");
	$hora+=2;
	echo strftime("<br>Sendo as $hora horas, %M minutos e %S segundos");

	//creamos o intante UNIX dun momento determinado:

	$momento=mktime(0,0,0,2,29,2020);//0h 0m 0s do 29 feb de 2020
	//              h m s m  d  ano 

	echo "<br>Instante Unix de 0h 0m 0s do 29 feb de 2020 : $momento";
	echo utf8_encode(strftime("<br>foi %A, %e de %B de %Y",$momento));
	$hora=strftime("%H",$momento);
	$hora+=2;
	echo strftime("<br>Sendo as $hora horas, %M minutos e %S segundos",$momento);






?>	
</body>
</html>