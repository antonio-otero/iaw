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
	$dni=$_GET["dni"]??"";
	$letra=$_GET["letra"]??"";

	$letra=strtoupper($letra);

	$dep=$_GET['dep'] ?? array(); //se non mandan datos, asumimos un array por defecto, para ter sempre o mesmo tipo de datos


	//var_dump($_GET);
	/*
	if($_GET) 
		echo "_GET verdadeiro";
	else
		echo "_GET falso";
	*/
	
	$faltanDatos=0; // supoñemos en principio que non faltan datos
	$dniError=false; //supoñemos en principio que o dni estará ben

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
			if( ($dni=="" || $letra=="") && $_GET) { 
				$clase="erro";
				$faltanDatos++; 
			} elseif($_GET) {
				//hai dni e letra e formulario enviado

				$letraCalculada=letraDNI( (int) $dni);
				if($letra==$letraCalculada) { 
					//dni e letra son correctos, cumplen algoritmo
					$clase="ok";
				} else {
					//a letra non se corresponde con dni
					$clase="incorrecto";
					$dniError=true;
				}

			}
		?>

		<div class="campos">
			<label for="dni" class="<?php echo $clase ?>">DNI/Letra:</label>
			<input type="text" id="dni" name="dni" size="5" maxlength="8" value="<?php echo $dni ?>" >
			<input type="text" id="letra" name="letra" size="1" maxlength="1" value="<?php echo $letra ?>">
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
			<label>Deportes:</label><br>
			<input id="futbol" type="checkbox" value="F" name="dep[]" <?php echo in_array("F",$dep)?'checked':'' ?>>
			<label for="futbol"> Fútbol</label>
			<input id="baloncesto" type="checkbox" value="B" name="dep[]" <?php echo in_array("B",$dep)?'checked':'' ?>>
			<label for="baloncesto"> Baloncesto</label>
			<input id="natacion" type="checkbox" value="N" name="dep[]" <?php echo in_array("N",$dep)?'checked':'' ?>>
			<label for="natacion"> Natación</label>
			<input id="atletismo" type="checkbox" value="A" name="dep[]" <?php echo in_array("A",$dep)?'checked':'' ?>>
			<label for="atletismo"> Atletismo</label>
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
	elseif($_GET && !$dniError) {?>
		<div id="correcto">
			<p>Formulario completo</p>		
		</div>
	<?php } 

	if($dniError) {
		echo "\n<div id='incorrecto'>";
		echo "\n<p>A letra ou o DNI non son correctos</p>";
		echo "\n</div>";
	}


	?>	




</div>

</body>
</html>