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
	<h1>Gardar datos formulario na táboa 'alumnos' da base de datos 'iaw21-22'</h1>
<?php 
	require("datos-conexion-BD.php");
	include("funcions.php");

	//echo letraDNI(33345651);

	//recibir os datos:
	$nome=$_GET["nome"]??"";
	$clave=$_GET["clave"]??"";
	$sexo=$_GET["sexo"]??"";
	$nif=$_GET["nif"]??"";

	$nif=strtoupper($nif);

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
	$menxases=""; //para indicar menxases de datos, correctos ou incorrectos
	$id="incorrecto";//para poñer o valor de id do div que mostras as menxases
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
			
			if($clave=="" && $_GET) { //clave sen datos e formulario enviado
				$clase="erro";
				$faltanDatos++; 
			} else 
				$clase=$_GET?"ok":"";
		?>

		<div class="campos">
			<label for="clave" class="<?php echo $clase ?>">Contrasinal:</label><br>
			<input type="password" id="clave" name="clave" value="<?php echo $clave ?>" >
		</div>




		<?php 
			if( $nif=="" && $_GET) { 
				$clase="erro";
				$faltanDatos++; 
			} elseif($_GET) {
				//hai nif e formulario enviado
				if(validarNif($nif)) { 
					//nif correcto, cumple algoritmo
					$clase="ok";
				} else {
					//a letra non se corresponde con dni
					$clase="incorrecto";
					$menxases.="A letra ou o DNI non son correctos<br>";
				}

			}
		?>

		<div class="campos">
			<label for="nif" class="<?php echo $clase ?>">NIF:</label>
			<input type="text" id="nif" name="nif" size="7" maxlength="9" value="<?php echo $nif ?>" >
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
	elseif($_GET && $menxases=="") {
		//gardamos os datos na base de datos 

		$c=mysqli_connect($servidorBD,$usuarioBD,$claveBD,$baseDatos,$puerto) or die ("<p>Erro conectando co servidor de bases de datos localhost<br></p>");

		$sql="SET NAMES 'utf8'";
		@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
									<br>Erro número:".mysqli_errno($c).
									"<br>Descrición erro:".mysqli_error($c).
									"</p>"
									);

		//neste punto xa temos conexión coa base de datos e coficación utf-8


		$deportes=implode("", $dep); //pasa os deportes a unha cadea sen separación (1 caracter por deporte)
		$sistemas=implode("*", $so); //pasa os sistemas operativos a unha cadea, separados por '*', (neste caso non todos os códigos teñen a mesma lonxitude)

		$sql="INSERT INTO `alumnos` (`nome`, `nif`, `clave`, `sexo`, `deportes`, `provincia`, `so`, `comentario`) VALUES
		('$nome','$nif','".hash('md5',$clave)."','$sexo','$deportes','$provincia','$sistemas','$coment')";

		// @mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
		// 						<br>Erro número:".mysqli_errno($c).
		// 						"<br>Descrición erro:".mysqli_error($c).
		// 						"</p>"
		// 						);

		@mysqli_query($c,$sql);
	
		switch (mysqli_errno($c)) {
			case 0: // mysqli_errno($c) devolve 0 se a sentenza sql foi executada correctamente
				$id="correcto";
				$menxases="Formulario completo<br>
							Datos gardados na táboa 'alumnos' da base de datos
							<br><a href='?'>Novo rexistro</a>";
				break;
			case 1062: //erro de clave duplicada -> nif duplicado
				$id="incorrecto";
				$menxases="O nif $dni$letra xa existe na base de datos";

				break;
			default:
				die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);
				break;
		}
		mysqli_close($c);//pecha a conexión coa base de datos

	}

	if($menxases!="") {
		echo "\n<div id='$id'>";
		echo "\n<p>$menxases</p>";
		echo "\n</div>";
	}
	?>	
</div>

</body>
</html>