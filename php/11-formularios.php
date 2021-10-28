<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularios</title>
	<link rel="stylesheet" href="css/11-formularios.css">
</head>
<body>
<div id="contenedor">
	<h1>Formularios</h1>
<?php 
	$nome=$_GET['nome'] ?? "";
	$ref=$_GET['ref'] ?? "";
	$sexo=$_GET['sexo'] ?? "";
	$cdn=$_GET['cdn'] ?? "";
	$coment=$_GET['coment'] ?? "";

	$dep=$_GET['dep'] ?? array();

	//var_dump($nome);
	//var_dump($ref);
	//var_dump($dep);
?>

	<form action="" method="GET">

		<div class="campos">
			<label for="nome">Nome:</label>
			<input id="nome" type="text" name="nome" value="<?php echo $nome ?>" >
		</div>

		<input type="hidden" name="ref" value="xr55">

		<div class="campos">
			<label>Sexo: </label>
			<input id="home" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':''  ?> > 
			<label for="home"> Home </label>
			<input id="muller" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':''  ?> > 
			<label for="muller"> Muller </label>
		</div>

		<div class="campos">
			<label for="cdn">Aceptar condicións</label>
			<input id="cdn" type="checkbox" value="SI" name="cdn" <?php echo $cdn=='SI'?'checked':'' ?> >
		</div>

		<div class="campos">
			<label for="coment">Comentario:</label><br>
			<textarea name="coment" id="coment"  rows="3"><?php echo $coment ?></textarea>
		</div>

		<div class="campos">
			<label>Deportes:</label><br>
			<input id="futbol" type="checkbox" value="F" name="dep[]" ><label for="futbol"> Fútbol</label>
			<input id="baloncesto" type="checkbox" value="B" name="dep[]" ><label for="baloncesto"> Baloncesto</label>
			<input id="natacion" type="checkbox" value="N" name="dep[]" ><label for="natacion"> Natación</label>
			<input id="atletismo" type="checkbox" value="A" name="dep[]" ><label for="atletismo"> Atletismo</label>
		</div>

		<div class="campos">
			<input type="submit" value="Enviar Datos">
		</div>
		



	</form>

	<div> 
		<h3>Datos recibidos:</h3>
<?php 
	echo "<br>Nome: $nome";
	echo "<br>Ref.: $ref";
	echo "<br>Sexo: $sexo";
	echo "<br>Condicións: $cdn";
	echo "<br>Comentario: $coment";
	echo "<br>Deportes (".count($dep).") : ";
	


?>
	</div>
</div>
	
	


</body>
</html>