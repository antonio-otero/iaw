<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Validación formularios</title>
	<link rel="stylesheet" href="css/11-formularios.css">
</head>
<body>

<div id="contenedor">
	<h1>Validación de formularios</h1>
<?php 
	
	include("funcions.php");

	//echo letraDNI(33345651);

	//recibir os datos:
	$nome=$_GET["nome"]??"";
	$sexo=$_GET["sexo"]??"";

	//var_dump($_GET);
	/*
	if($_GET) 
		echo "_GET verdadeiro";
	else
		echo "_GET falso";
	*/
	
	$faltanDatos=0; // supoñemos en principio que non faltan datos

?>	


	<form action="" method="GET">
		
		<?php 
			
			if($nome=="" && $_GET) { //nome sen datos e formulario enviado
				$clase="erro";
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>

		<div class="campos">
			<label for="nome" class="<?php echo $clase ?>">Nome:</label><br>
			<input type="text" id="nome" name="nome" value="<?php echo $nome ?>" >
		</div>
		<?php 
			

		?>

		<div class="campos">
			<label for="dni">DNI/Letra:</label>
			<input type="text" id="dni" name="dni" size="10" >
			<input type="text" id="letra" name="letra" size="1">
		</div>

		<?php 
			if($sexo=="" && $_GET) { //sexo sen datos e formulario enviado
				$clase="erro";
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>

		<div class="campos">
			<label class="<?php echo $clase ?>">Sexo:</label>
			<input type="radio" name="sexo" value="H" id="home" <?php echo $sexo=="H"?"checked":"" ?>>
			<label for="home"> Home </label>
			<input type="radio" name="sexo" value="M" id="muller" <?php echo $sexo=="M"?"checked":"" ?>>
			<label for="muller"> Muller</label>
		</div>


		<div class="campos">
			<input type="submit" value="Enviar datos">
		</div>
	</form>

	<?php if($faltanDatos>0) { ?>
		<div id="alertas">
			<p>Formulario incorrecto, Faltan <?php echo $faltanDatos ?> datos</p>		
		</div>
	<?php } 
	elseif($_GET) {?>
		<div id="correcto">
			<p>Formulario completo</p>		
		</div>
	<?php } ?>	

</div>

</body>
</html>