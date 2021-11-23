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
	$sexo=$_GET['sexo']??"";
	$provincia=$_GET['provincia']??"";
	$orden=$_GET['orden']??"";

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

	$filtro="";
	$filtroGet="";
	if($sexo!=""){
		$filtro.=" and sexo='$sexo'";
		$filtroGet.="&sexo=$sexo";
	}
	if($provincia!=""){
		$filtro.=" and provincia='$provincia'";
		$filtroGet.="&provincia=$provincia";
	}

	$ordenar="provincia,nome";//ordenación por defecto

	if($orden!="") {
		$ordenar=$orden;
	} 


	$sql="SELECT * FROM alumnos WHERE 1 $filtro ORDER BY $ordenar";

	$resultado=enviarConsultaBD($c,$sql);

	$numFilas=mysqli_num_rows($resultado);//devolve o número de filas seleccionadas por unha SELECT
?>
	<div class="formulario">
		<form action="" method="GET">
			<input type="radio" name="sexo" value="H" id="home" <?php echo $sexo=="H"?"checked":"" ?>>
			<label for="home"> Home </label>
			<input type="radio" name="sexo" value="M" id="muller" <?php echo $sexo=="M"?"checked":"" ?>>
			<label for="muller"> Muller</label>

			<label class="m-3" for="provincia">Provincia:</label>
			<select name="provincia" id="provincia">
				<option value=""></option>
				<option value="CO" <?php echo $provincia=='CO'?'selected':'' ?>>A Coruña</option>
				<option value="LU" <?php echo $provincia=='LU'?'selected':'' ?>>Lugo</option>
				<option value="OU" <?php echo $provincia=='OU'?'selected':'' ?>>Ourense</option>
				<option value="PO" <?php echo $provincia=='PO'?'selected':'' ?>>Pontevedra</option>
			</select>


			<input class="m-3 btn btn-primary" type="submit" value="Filtrar">
			<a href="?" class=" btn btn-primary">Eliminar filtro</a>
			
		</form>
		
	</div>

	<table class="table table-striped caption-top">	
		<caption><?php echo "$sql -> $numFilas rexistros:" ?> </caption>
		<tr>
			<th><a href="<?php echo "?orden=nome$filtroGet" ?>" >&#8593; Nome</a></th>
			<th>DNI-Letra</th>
			<th><a href="<?php echo "?orden=sexo$filtroGet" ?>">&#8593; Sexo</a></th>
			<th>Deportes</th>
			<th><a href="<?php echo "?orden=provincia$filtroGet" ?>">&#8593; Provincia</a></th>
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