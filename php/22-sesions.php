<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sesións php</title>
</head>
<style>
	#contenedor {
		width: 80%;
		border: 1px solid blue;
		padding: 15px;
	}
	.campos {
		margin-bottom: 12px;
	}

</style>
<body>
<?php 
	//simulamos os datos que estarían gardados na base de datos
	$usuarioBD='Luis';
	$claveHashBD='$2y$10$FoINc8eUvRaThoTgY24ay.tWHVFdS9x3uSqvvqaBJRPzNuatZuaRK';

	//$permiso=false; //en principio a identidade non está verificada
	$usuario=$_POST["usuario"]??"";
	$clave=$_POST["clave"]??"";

	if($_POST) {

		//echo "<br>usuario:$usuario";
		//echo "<br>Contrasinal:$clave";
		//$claveHash=password_hash($clave, PASSWORD_DEFAULT); //calcula hash do contrasinal
		//echo "<br>Hash do contrasinal:$claveHash";
		//comprobamos credenciais

		if($usuario==$usuarioBD) {//o nome de usuario é correcto

			if(password_verify($clave,$claveHashBD)) {
				echo "<p>Indentidade verificada";
				//$permiso=true;

				$_SESSION['usuario']="$usuario";
				$_SESSION['tempo']=time();

			}
			else {
				echo "<p>Identidade rechazada</p>";
			}

		} else {
			echo "<p>Identidade rechazada</p>";
		}


	}

	if(!isset($_SESSION['usuario'])) {
 ?>
 	<div class="contenedor">
 		<h1>Indenticación</h1>
 		<form action="" method="POST">

 			<div class="campos">
 				<label for="usuario">Usuario:</label>
 				<input type="text" id="usuario" name="usuario">
 			</div>
 			<div class="campos">
 				<label for="clave">Contrasinal:</label>
 				<input type="password" id="clave" name="clave">
 			</div>
 			<div class="campos">
 				<input type="submit" value="Enviar">
 			</div>

 		</form>

 	</div>
<?php 	
		} else { //identidade verificada
?>		
		
		<div class="contenedor">	
				<h1>Identidade verificada</h1>

				<ul>	
					<li><a href="22-sesions-2.php">Opción 1</a></li>
					<li>Opción 2</li>
					<li>Opción 3</li>
					<li>Opción 4</li>
					<li><a href="22-sesions-pechar.php">Pechar sesión</a></li>	
				</ul>

		</div>


<?php 	
		}
 ?>	
</body>
</html>