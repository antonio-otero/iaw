<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Base de Datos</title>
</head>
<body>
	<h1>Conexión a Base de Datos</h1>
<?php 


	require("../datos-conexion.php");

	//cargamos datos de conexión a BD

	$c=@mysqli_connect($servidor,$usuario,$clave) or die("<br>Erro conectando co servidor MySql $servidor");

	echo "<br>Se fixo conexión co servidor MySql $servidor";

	$sql="CREATE DATABASE IF NOT EXISTS `$baseDatos` COLLATE 'utf8_general_ci'";

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao crear a base de datos $baseDatos
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));


	echo "<br>Creouse a base de datos $baseDatos (se non existía)";


	//Seleccionamos a base de datos coa que imos traballar:

	@mysqli_select_db($c,$baseDatos) 
		or die ("<br>Erro ao sellecionar a base de datos $baseDatos
				 <br>Erro número".mysqli_errno($c).
				 "<br>".mysqli_error($c));

	echo "<br>A base de datos $baseDatos foi seleccionada";

	//indicamos que a comunicación coa base de datos será en codificación UTF8

	$sql="SET NAMES 'utf8'";

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));

	echo "<br>Estableceuse comunicación coa base de datos $baseDatos en formato utf8";

	$sql="CREATE TABLE IF NOT EXISTS alumnos2 (
			registro	INT NOT NULL AUTO_INCREMENT,
			nombre		CHAR(25),
			apellidos	CHAR(50),
			sexo		CHAR(1),
			nif			CHAR(9),
			deportes	CHAR(10),
			provincia	CHAR(2),
			PRIMARY KEY (registro),
			UNIQUE KEY nif (nif)
	     );
	";

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));


	echo "<br>Creouse a táboa alumnos2 (se non existía)";



	$sql="CREATE TABLE IF NOT EXISTS usuarios (
			id			INT NOT NULL AUTO_INCREMENT,
			nombre		CHAR(25),
			apellidos	CHAR(50),
			email		CHAR(50),
			clave		CHAR(100),
			PRIMARY KEY (id),
			UNIQUE KEY email (email)
	     );
	";

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));


	echo "<br>Creouse a táboa usuarios (se non existía)";

	//borramos os posibles rexistros da táboa usuarios
	$sql="TRUNCATE TABLE usuarios";
	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));

	echo "<br>Foron eliminados os rexistros da táboa usuarios (se existian)";

	//insertamos rexistros na táboa usuarios



	$sql="INSERT INTO usuarios VALUES 
		(NULL,'admin','admin admin','admin@admin.com', '".password_hash('abc123.', PASSWORD_DEFAULT)."')
	";      

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));

	$numeroRexistros=mysqli_affected_rows($c); //devolve o número de filas da última query

	echo "<br>Se engadiron $numeroRexistros á táboa usuarios";


	$sql="SELECT * FROM usuarios"; 

	$result=@mysqli_query($c,$sql) or die ("<br>Erro ao executar a sentencia sql: $sql
											<br>Erro número".mysqli_errno($c).
											"<br>".mysqli_error($c));


	$numeroRexistros=mysqli_num_rows($result); //devolve o número de rexistros da SELECT

	echo "<br><br> a sentencia <strong>$sql</strong> devolve $numeroRexistros rexistros";

	echo "<br>vemos o resultado da select coa funcion mysqli_fetch_array()";

	while ($fila=mysqli_fetch_array($result)) {
		//mysqli_fetch_array devolve a seguinta fila da select ou false se non hai máis, o formato e un array asociativo, os índices son os nomes dos campos
		echo "<br>{$fila['id']} - {$fila['nombre']} - {$fila['apellidos']} - {$fila['email']} - {$fila['clave']}";
	}


	mysqli_close($c);

	echo "<br><br>Se pechou a conexión co servidor de base de datos $servidor";

 ?>	

</body>
</html>
