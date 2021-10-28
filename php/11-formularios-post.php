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
	<h1>Formularios con método envío POST</h1>
<?php 
	$nome=$_POST['nome'] ?? "";
	$ref=$_POST['ref'] ?? "";
	$sexo=$_POST['sexo'] ?? "";
	$cdn=$_POST['cdn'] ?? "";
	$coment=$_POST['coment'] ?? "";
	$dep=$_POST['dep'] ?? array(); //se non mandan datos, asumimos un array por defecto, para ter sempre o mesmo tipo de datos
	$provincia=$_POST['provincia'] ?? "";
	$so=$_POST['so'] ?? array(); 

	//var_dump($nome);
	//var_dump($ref);
	//var_dump($dep);
	//var_dump($so);
?>

	<form action="" method="POST">

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
			<label for="provincia">Provincia:</label>
			<select name="provincia" id="provincia">
				<option value=""></option>
				<option value="CO" <?php echo $provincia=='CO'?'selected':'' ?>>A Coruña</option>
				<option value="LU" <?php echo $provincia=='LU'?'selected':'' ?>>Lugo</option>
				<option value="OU" <?php echo $provincia=='OU'?'selected':'' ?>>Ourense</option>
				<option value="PO" <?php echo $provincia=='PO'?'selected':'' ?>>Pontevedra</option>
			</select>
		</div>

		<div class="campos">
			<label for="so">Sistemas Operativos:</label><br>
			<select name="so[]" id="so" multiple="" size="5">
				<option value="W8" <?php echo in_array('W8',$so)?'selected':'' ?>>Windows 8</option>
				<option value="W10" <?php echo in_array('W10',$so)?'selected':'' ?>>Windows 10</option>
				<option value="W11" <?php echo in_array('W11',$so)?'selected':'' ?>>Windows 11</option>
				<option value="LX" <?php echo in_array('LX',$so)?'selected':'' ?>>Linux</option>
				<option value="MOS" <?php echo in_array('MOS',$so)?'selected':'' ?>>macOS</option>
			</select>
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
	foreach ($dep as $valor) {
		echo "$valor ";
	}
	echo "<br>Provincia: $provincia";
	echo "<br>Sistemas Operativos (".count($so).") : ";
	foreach ($so as $valor) {
		echo "$valor ";
	}



?>
	</div>
</div>
	
	


</body>
</html>