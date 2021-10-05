<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Prácticas</title>
</head>
<body>
	<h1>Prácticas PHP básicas</h1>
<?php 	
	//xeramos números do 1 ao 10 nun párrafo html
	echo "\n<p>";

	for ($numero=1; $numero <= 10 ; $numero++) { 
		echo "$numero, ";
	}
	echo "</p>";

	//xeramos números do 1 ao 100 nunha lista desordenada
	//calculamos a suma de todos estos números

	$suma=0;
	echo "\n<ul>";
	for ($numero=1; $numero <= 100 ; $numero++) { 
		echo "\n\t<li>$numero</li>";
		$suma=$suma+$numero;
		//var_dump($suma);
	}
	echo "\n</ul>";

	echo "\n<p>A suma da lista de números e: <b>$suma</b></p>";





?>	


</body>
</html>