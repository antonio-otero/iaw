<?php
/* código para altas y modificaciones de registros */

$nombre=$_POST["nombre"] ?? "";
$apellidos=$_POST["apellidos"] ?? "";
$sexo=$_POST["sexo"] ?? "";
$nif=$_POST["nif"] ?? "";
$deportes=$_POST["deportes"] ?? array();
$provincia=$_POST["provincia"] ?? "";

if($op=="m" && !$_POST) { //se solicita modificación de un reg. y aún no fue enviado el formulario 
	$sql="SELECT * FROM alumnos2 WHERE registro=$nreg";
	$result=enviarConsulta($c,$sql);
	if($fila=mysqli_fetch_array($result)) {
		$nombre=$fila["nombre"];
		$apellidos=$fila["apellidos"];
		$sexo=$fila["sexo"];
		$nif=$fila["nif"];
		$deportes=explode("-", $fila["deportes"]);//obtengo el array de las claves de deportes
		$provincia=$fila["provincia"];
	}

}

$nif=strtoupper($nif);//solucionamos problemas con las letras minúsculas

?>

<div id="formulario">

	<h3 class="text-center"><?php echo $op=="a"?"Nuevo":"Modificar" ?> alumno</h3>

	<form method="POST">
<?php 
	$errores=false; //suponemos que no hay errores en los datos del formulario

	//control del campo nombre:
	$control="";$icon="";$men="";
	if($nombre=="" && $_POST) {
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men="Este campo es obligatorio";
		$errores=true;
	}

 ?>	

	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" for="c1">Nombre</label>
	  <input type="text" class="form-control" id="c1" aria-describedby="texto1" name="nombre" value="<?php echo $nombre ?>" >
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto1" class="help-block"><?php echo $men ?></span>
	</div>

<?php 
	//control del campo apellidos:
	$control="";$icon="";$men="";
	if($apellidos=="" && $_POST) {
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men="Este campo es obligatorio";
		$errores=true;
	}
 ?>	
	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" for="c2">Apellidos</label>
	  <input type="text" class="form-control" id="c2" aria-describedby="texto2" name="apellidos" value="<?php echo $apellidos ?>" >
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto2" class="help-block"><?php echo $men ?></span>
	</div>


<?php 
	//control del campo sexo:
	$control="";$icon="";$men="";
	if($sexo=="" && $_POST) {
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men="Este campo es obligatorio";
		$errores=true;
	}
 ?>	
	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" >Sexo </label>
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto3" class="help-block"><?php echo $men ?></span>
	  <div class="radio">
	  	<label> 
	  		<input type="radio" name="sexo" value="H" <?php echo $sexo=="H"?"checked":"" ?> >Hombre 
	  	</label>
	  	<label> 
	  		<input type="radio" name="sexo" value="M" <?php echo $sexo=="M"?"checked":"" ?> >Mujer 
	  	</label>
	  </div>

	</div>


<?php 
	//control del campo NIF:
	$control="";$icon="";$men="";
	if($nif=="" && $_POST) {
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men="Este campo es obligatorio";
		$errores=true;
	}elseif($_POST) {//nif con contenido y formulario enviado
		$dni=substr($nif,0,-1); //tomamos el dni (todos los caracteres menos el último
		$letra=substr($nif, -1); //tomamos la letra (último carácter)
		if(strlen($dni)!=8 || !is_numeric($dni)){
			$control="has-error has-feedback";
			$icon="glyphicon-remove";
			$men="El dni debe ser numérico de 8 dígitos. ";
			$errores=true;
		}
		if(strlen($letra)!=1 || is_numeric($letra)){
			$control="has-error has-feedback";
			$icon="glyphicon-remove";
			$men.="La letra debe ser un carácter alfabético";
			$errores=true;
		}
		if($control=="") { //la sintaxis del nif es correcta, comprobamos si se corresponde la letra con el dni
			if($letra!=letranif($dni)) {
				$control="has-warning has-feedback";
				$icon="glyphicon-warning-sign";
				$men="NIF incorrecto, no se corresponde dni con letra";
				$errores=true;
			}
		}
	}

 ?>	
	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" for="c4">NIF</label>
	  <input type="text" class="form-control" id="c4" aria-describedby="texto4" name="nif" value="<?php echo $nif ?>" >
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto4" class="help-block"><?php echo $men ?></span>
	</div>

<?php 
	//control del campo deportes, es opcional:
	$control="";$icon="";$men="";
 ?>	
	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" >Deportes </label>
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto5" class="help-block"><?php echo $men ?></span>
	  <div class="checkbox">
	  	<label> 
	  		<input type="checkbox" name="deportes[]" value="F" <?php echo in_array("F", $deportes)?"checked":"" ?> >Fútbol &nbsp;
	  	</label>
	  	<label> 
	  		<input type="checkbox" name="deportes[]" value="T" <?php echo in_array("T", $deportes)?"checked":"" ?> >Ténis &nbsp;
	  	</label>
	  	<br>
	  	<label> 
	  		<input type="checkbox" name="deportes[]" value="C" <?php echo in_array("C", $deportes)?"checked":"" ?> >Curling &nbsp;
	  	</label>
	  	<label> 
	  		<input type="checkbox" name="deportes[]" value="B" <?php echo in_array("B", $deportes)?"checked":"" ?> >Baloncesto
	  	</label>
	  </div>

	</div>

<?php 
	//control del campo provincia:
	$control="";$icon="";$men="";
	if($provincia=="" && $_POST) {
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men="Este campo es obligatorio";
		$errores=true;
	}
 ?>	
	<div class="form-group <?php echo $control ?>">
	  <label class="control-label" for="c6">Provincia</label>
	  <select class="form-control" id="c6" aria-describedby="texto6" name="provincia">
		<option value=""></option>
		<option value="CO" <?php echo $provincia=="CO"?"selected":"" ?>>A Coruña</option>
		<option value="LU" <?php echo $provincia=="LU"?"selected":"" ?>>Lugo</option>
		<option value="OU" <?php echo $provincia=="OU"?"selected":"" ?>>Ourense</option>
		<option value="PO" <?php echo $provincia=="PO"?"selected":"" ?>>Pontevedra</option>
	  </select>	
	  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
	  <span id="texto6" class="help-block"><?php echo $men ?></span>
	</div>
	

<?php 
    $textoBoton=$op=='a'?'ALTA Alumno/a':'MODIFICAR Alumno/a';

	if(!$errores && $_POST) { //no hay errores y ha sido enviado el formulario
		//podemos dar de alta o actualizar según el caso.

		$deportes=implode("-", $deportes);
		if ($op=="a") {

			$sql="INSERT INTO alumnos2 VALUES 
				  (NULL,'$nombre','$apellidos','$sexo','$nif','$deportes','$provincia');
			";
		} else {
			$sql="UPDATE alumnos2
					SET 
						nombre='$nombre',
						apellidos='$apellidos',
						sexo='$sexo',
						nif='$nif',
						deportes='$deportes',
						provincia='$provincia'
					WHERE registro=$nreg;	
			";
		}

		$result=@mysqli_query($c, $sql);//@ para que no muestre errores 

		switch (mysqli_errno($c)) { //controlamos posibles errores base datos
			case 0://la sentencia sql se ejecutó con éxito
				$texto=$op=="a"?"Aceptado/a":"Actualizado/a";

				echo "<p class='text-success bg-success' >Alumno/a $texto</p>";
				if ($op=="a") 
					echo "<a href='index.php?op=a' class='btn btn-default'>Nuevo registro</a>";
				else 
					echo "<input class='btn btn-default' type='submit' value='MODIFICAR Alumno/a' >";

				echo " <a href='index.php' class='btn btn-default'>Volver</a> ";
				break;
			case 1062:// error por nif duplicado
				echo "<p class='text-warning bg-warning' >El NIF ya existe</p>";
 				echo "<input class='btn btn-default' type='submit' value='$textoBoton' >";
 				echo " <a href='index.php' class='btn btn-default'>Cancelar</a> ";
			
			default:
				die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
					<p>Error número:".mysqli_errno($c)."</p>
					<p>".mysqli_error($c)."</p>");
				break;
		}
		
	} else {
?>
			<div class="form-group">
				<input class="btn btn-default" type="submit" value="<?php echo $textoBoton ?>">
				<a class="btn btn-default" href="index.php">Cancelar</a>
			</div>

<?php 
	} 
?>	


		
	</form>

</div>