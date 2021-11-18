<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Directorios PHP</title>
</head>
<body>
	<h1>Directorios PHP</h1>
<?php 
	$dir=$_GET["dir"]??"C:\\"; //se non se pasa directorio, usamos unidade D:
	
	@chdir($dir) or die("<p>Non foi posible posicionarse no directorio $dir</p>");

	$cd=@opendir($dir) or die("<p>Non foi posible abrir o directorio $dir</p>");

	echo "\n<h3>Contido do directorio $dir</h3>";

	echo "\n<ul>";
	while ($elemento=readdir($cd)) {//lemos a seguinte entrada no directorio asociado a $cd (controlador de directorio)

		if(is_dir($elemento)) {
			echo "\n<li><a href='?dir=$dir\\$elemento'>$elemento (DIR)</a></li>";
		} else {
			echo "\n<li>$elemento</li>";
		}

	}
	echo "\n</ul>";


?>


</body>
</html>