<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar datos ficheiro formulario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Mostrar datos do ficheiro datos-formulario.csv</h1>


	<table class="table table-striped">	
		<tr>
			<th>Nome</th>
			<th>DNI-Letra</th>
			<th>Sexo</th>
			<th>Deportes</th>
			<th>Provincia</th>
			<th>Sistemas O.</th>
			<th>Comentario</th>
		</tr>	

	<?php
	$ficheiro="datos/datos-formulario.csv";
	$cf=@fopen($ficheiro, "r") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	$rexistro=fgets($cf);
	while (!feof($cf)) {//mentres non é final de ficheiro
		$campos=explode(";", $rexistro);
		list($nome, $dni, $letra, $sexo, $dep, $provincia, $so, $coment)=$campos;
		//xerar a fila de táboa cos datos deste rexistro:
		echo "\n\t\t<tr>";
		echo "\n\t\t\t<td>$nome</td>";
		echo "\n\t\t\t<td>$dni-$letra</td>";
		echo "\n\t\t\t<td>$sexo</td>";
		echo "\n\t\t\t<td>$dep</td>";
		echo "\n\t\t\t<td>$provincia</td>";
		echo "\n\t\t\t<td>$so</td>";
		echo "\n\t\t\t<td>$coment</td>";

		echo "\n\t\t</tr>";

		$rexistro=fgets($cf);
	}	
	fclose($cf);
?>
	</table>	

</div>
</body>
</html>