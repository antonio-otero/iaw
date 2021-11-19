<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar datos de base de datos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Mostrar datos da táboa 'alumnos' da base de datos 'iaw21-22'</h1>
<?php 
	$nomeProvincias = array(
		"CO" => "A Coruña" , 
		"LU" => "Lugo" , 
		"OU" => "Ourense" , 
		"PO" => "Pontevedra"  
	);
	$nomeSistemas = array(
		"W8"  => "Windows 8",
		"W10" => "Windows 10",
		"W11" => "Windows 11",
		"LX"  => "Linux",
		"MOS" => "macOS"
	);
	$nomeDeportes = array(
		"F" => "Fútbol", 
		"B" => "Baloncesto", 
		"N" => "Natación", 
		"A" => "Atletismo"
	);
	require "datos-conexion-BD.php";
	require "funcions.php";
	
	$c=conexionBaseDatos($servidorBD,$usuarioBD,$claveBD,$baseDatos,$puerto);
	
	$sql="SELECT * FROM alumnos ORDER BY provincia,nome";

	$resultado=enviarConsultaBD($c,$sql);

	$numFilas=mysqli_num_rows($resultado);//devolve o número de filas seleccionadas por unha SELECT
?>

	<table class="table table-striped caption-top">	
		<caption><?php echo "$numFilas rexistros:" ?> </caption>
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
	while($fila=mysqli_fetch_row($resultado)) {
		list($id,$nome,$nif,$clave,$sexo,$dep,$provincia,$so,$coment)=$fila;
		//xerar a fila de táboa cos datos deste rexistro:

		echo "\n\t\t<tr>";
		echo "\n\t\t\t<td>$nome</td>";
		echo "\n\t\t\t<td>$nif</td>";
		$textoSexo = $sexo=="H" ? "Home" : "Muller";
		echo "\n\t\t\t<td>$textoSexo</td>";

		echo "\n\t\t\t<td>";//celda dos deportes
		echo "\n\t\t\t\t<ol>";
		for ($i=0; $i < strlen($dep) ; $i++) { 
			echo "\n\t\t\t\t\t<li>{$nomeDeportes[$dep[$i]]}</li>";
		}		

		echo "\n\t\t\t\t</ol>";
		echo "\n\t\t\t</td>";
		
		echo "\n\t\t\t<td>$nomeProvincias[$provincia]</td>";

		echo "\n\t\t\t<td>";//celda dos sistemas operativos
		echo "\n\t\t\t\t<ul>";
		$codSo=explode("*", $so);
		foreach ($codSo as $codigo) {
			echo "\n\t\t\t\t\t<li>$nomeSistemas[$codigo]</li>";
		}
		echo "\n\t\t\t\t<ul>";
		echo "\n\t\t\t</td>";
		

		echo "\n\t\t\t<td>$coment</td>";

		echo "\n\t\t</tr>";

	}	

	mysqli_close($c);//pecha a conexión coa base de datos


	
?>
	</table>	

</div>
</body>
</html>