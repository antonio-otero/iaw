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

	$provincia=$_GET["provincia"]??"";
	$so=$_GET['so'] ?? array(); //se non mandan datos, asumimos un array por defecto, para ter sempre o mesmo tipo de datos

	$coment=$_GET["coment"]??"";


	//var_dump($_GET);
	/*
	if($_GET) 
		echo "_GET verdadeiro";
	else
		echo "_GET falso";
	*/
	
	$faltanDatos=0; // supoñemos en principio que non faltan datos
	$menxases=""; //para indicar menxases de datos incorrectos
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
					$menxases.="A letra ou o DNI non son correctos<br>";
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

		<?php 
			if(count($dep)<2 && $_GET) { //menos de 2 deportes e formulario enviado
				//$clase=count($dep)==0?"erro":"incorrecto";
				if(count($dep)==0) {
					$clase="erro";
				} else {
					$clase="incorrecto";
					$menxases.="É obrigatorio marcar un mínomo de 2 deportes<br>";
				}
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>


		<div class="campos">
			<label class="<?php echo $clase ?>">Deportes (marcar mínimo 2):</label><br>
			<input id="futbol" type="checkbox" value="F" name="dep[]" <?php echo in_array("F",$dep)?'checked':'' ?>>
			<label for="futbol"> Fútbol</label>
			<input id="baloncesto" type="checkbox" value="B" name="dep[]" <?php echo in_array("B",$dep)?'checked':'' ?>>
			<label for="baloncesto"> Baloncesto</label>
			<input id="natacion" type="checkbox" value="N" name="dep[]" <?php echo in_array("N",$dep)?'checked':'' ?>>
			<label for="natacion"> Natación</label>
			<input id="atletismo" type="checkbox" value="A" name="dep[]" <?php echo in_array("A",$dep)?'checked':'' ?>>
			<label for="atletismo"> Atletismo</label>
		</div>

		<?php 
			if($provincia=="" && $_GET) { 
				$clase="erro";
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>

		<div class="campos">
			<label class="<?php echo $clase ?>"  for="provincia">Provincia:</label>
			<select name="provincia" id="provincia">
				<option value=""></option>
				<option value="CO" <?php echo $provincia=='CO'?'selected':'' ?>>A Coruña</option>
				<option value="LU" <?php echo $provincia=='LU'?'selected':'' ?>>Lugo</option>
				<option value="OU" <?php echo $provincia=='OU'?'selected':'' ?>>Ourense</option>
				<option value="PO" <?php echo $provincia=='PO'?'selected':'' ?>>Pontevedra</option>
			</select>
		</div>

		<?php 
			if(count($so)==0 && $_GET) { 
				$clase="erro";
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>

		<div class="campos">
			<label class="<?php echo $clase ?>" for="so">Sistemas Operativos:</label><br>
			<select name="so[]" id="so" multiple="" size="5">
				<option value="W8" <?php echo in_array('W8',$so)?'selected':'' ?>>Windows 8</option>
				<option value="W10" <?php echo in_array('W10',$so)?'selected':'' ?>>Windows 10</option>
				<option value="W11" <?php echo in_array('W11',$so)?'selected':'' ?>>Windows 11</option>
				<option value="LX" <?php echo in_array('LX',$so)?'selected':'' ?>>Linux</option>
				<option value="MOS" <?php echo in_array('MOS',$so)?'selected':'' ?>>macOS</option>
			</select>
		</div>

		<div class="campos">
			<label for="coment">Comentario (opcional):</label><br>
			<textarea name="coment" id="coment"  rows="3"><?php echo $coment ?></textarea>
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
	elseif($_GET && $menxases=="") {?>
		<div id="correcto">
			<p>Formulario completo</p>		
		</div>
	<?php } 

	if($menxases!="") {
		echo "\n<div id='incorrecto'>";
		echo "\n<p>$menxases</p>";
		echo "\n</div>";
	}


	?>	




</div>

</body>
</html>