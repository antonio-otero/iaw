<?php 
$email=$_POST["email"] ?? "";
$clave=$_POST["clave"] ?? "";

if($_POST) { //sabemos si se envió el formulario
	$sql="SELECT * FROM usuarios WHERE email='$email'";
	//echo "<hr>$sql<hr>";
	$result=enviarConsulta($c,$sql);
	if($fila=mysqli_fetch_array($result)) {//leemos la única fila posible, si existe
		$nombre=$fila["nombre"];
		$apellidos=$fila["apellidos"];
		//echo "<hr>$nombre, $apellidos<hr>";
		if(password_verify($clave,$fila["clave"])) { //determina si la clave se corresponde con hash en base de datos
			//login correcto
			//guardamos en varibles de sesión los datos deseados.
			$_SESSION['nombre']=$nombre;
			$_SESSION['apellidos']=$apellidos;
			$_SESSION['email']=$email;
			echo "<script>document.location.href='index.php'</script>"; //esto nos redirige a index.php , sin parámetros
			die();

		}

	}

}

?>

<div id="formulario">
	<h3 class="text-center">Login usuario</h3>
	<form method="POST">
		<div class="form-group">
			<label for="c1">Email:</label>
			<input type="email" class="form-control" id="c1" placeholder="Email" name="email" required value="<?php echo $email ?>">
		</div>
		<div class="form-group">
			<label for="c2">Clave:</label>
			<input type="password" class="form-control" id="c2" placeholder="Password" name="clave" required>
		</div>

		<?php 
		if ($_POST) //si llego aquí y el form fue enviado, es que no pasó los controles 
			echo "<p class='text-warning bg-danger'>El email o la clave no son correctos</p>";
		?>

		<div class="form-group">
			<input type="submit" value="Login" class="btn bnt-default">
		</div>		

	</form>

</div>