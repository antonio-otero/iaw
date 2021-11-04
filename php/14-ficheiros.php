<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Ficheiros en PHP</title>
	<link rel="stylesheet" href="css/14-ficheiros.css">
</head>
<body>
	<h1>Ficheiros en PHP</h1>
	<h3>Lectura de ficheiro csv por liñas completas</h3>
	<?php
	$ficheiro="datos/datos1.csv";
	$cf=@fopen($ficheiro, "r") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	//$cf será o controlador de ficheiro. A partir de aquí temos que usar $cf para operacións sobre o ficheiro

	$rexistro=fgets($cf);
	//a función feof devolve verdadeiro cando se chega ao final do ficheiro que se está a ler
	while (!feof($cf)) {//mentres non é final de ficheiro
		echo "<br>$rexistro";
		$rexistro=fgets($cf);
	}	
	fclose($cf);
	?>


	
</body>
</html>