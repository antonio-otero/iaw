<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bases de datos</title>
</head>
<body>
	<h1>Bases de datos en PHP</h1>
<?php 
	require 'datos-conexion-BD.php';

	$c=mysqli_connect($servidorBD,$usuarioBD,$claveBD,"",$puerto) or die ("<p>Erro conectando co servidor de bases de datos localhost<br></p>");

	echo "<p>Conexión co servidor de bases de datos localhost establecida con éxito</p>";

	$sql="CREATE DATABASE IF NOT EXISTS `$baseDatos` COLLATE 'utf8_general_ci'"; //CREATE DATABASE `iaw21-22` /*!40100 COLLATE 'utf8_general_ci' */
	//var_dump($sql);
	echo "<p>$sql</p>";

	mysqli_query($c,$sql) or die ("<p>Erro ao crear a base de datos $baseDatos
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	echo "<p>Creouse a base de datos $baseDatos (se non existía) </p>";
	@mysqli_select_db($c,$baseDatos) or die ("<p>Erro ao seleccionar a base de datos $baseDatos
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	echo "<p>Seleccionouse a base de datos $baseDatos</p>";

	$sql="SET NAMES 'utf8'";
	echo "<p>$sql</p>";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	echo "<p>Codificación UTF-8 establecida</p>";

	$sql="CREATE TABLE IF NOT EXISTS alumnos 
	(
		id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
		nome 		CHAR(40),
		nif 		CHAR(9),
		clave		CHAR(100),
		sexo 		CHAR(1),
		deportes 	CHAR(4),
		provincia	CHAR(2),
		so 			CHAR(30),
		comentario	TEXT,
		PRIMARY KEY (id),
		UNIQUE KEY  (nif)
	);
	";
	echo "<p>$sql</p>";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);
	echo "<p>Creose a táboa 'alumnos' (se non existía)</p>";

	$sql="TRUNCATE alumnos";//eliminamos todo o contido da táboa alumnos
	echo "<p>$sql</p>";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);	

	echo "<p>Eliminouse o contido da táboa alumnos, se había</p>";

	$sql="INSERT INTO `alumnos` (`nome`, `nif`, `clave`, `sexo`, `deportes`, `provincia`, `so`, `comentario`) VALUES
	('Ana Díaz','12345678Z','".hash('md5','abc123.')."','M','NB','LU','w10*LX','Preferencia nocturno'),
	('Luis Fernández','12345677J','".hash('md5','abc123.')."','H','FB','CO','w10*LX','Preferencia diúrno'),
	('Gonzalo Abuín','12345676N','".hash('md5','abc123.')."','H','FN','PO','w8*MOS',''),
	('Julia Moteagudo','12345675B','".hash('md5','abc123.')."','M','FNB','CO','w8*LX','Becario'),
	('César Ríos','12345674X','".hash('md5','abc123.')."','H','FN','LU','w10','Preferencia nocturno')
	";


	echo "<p>$sql</p>";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_affected_rows($c); //devolve o número de filas afectadas na ultima query (NON SELECT)
	echo "<p>Engadíronse $numFilas filas con éxito na táboa 'alumnos'</p>";

	//sentencias de tipo SELECT

	$sql="SELECT * FROM alumnos ORDER BY provincia,nome";
	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_num_rows($resultado);//devolve o número de filas seleccionadas por unha SELECT
	echo "<p>a sentenza <strong>$sql</strong> devolve <strong>$numFilas</strong> filas</p>";
	echo "<p>Listamos as filas usando a función mysqli_fetch_row() </p>";

	//$fila=mysqli_fetch_row($resultado);//devolve un array ca seguinte fila da SELECT, devolve false cando non queden filas
	//var_dump($fila);

	// while($fila=mysqli_fetch_row($resultado)) {
	// 	echo "<br>$fila[0] - $fila[1] - $fila[2] - $fila[3] - $fila[4] - $fila[5] - $fila[6] - $fila[7] - $fila[8]";
	// }

	while($fila=mysqli_fetch_row($resultado)) {
		list($id,$nome,$nif,$clave,$sexo,$deportes,$provincia,$so,$comentario)=$fila;
		echo "<br>$id - $nome - $nif - $clave - $sexo - $deportes - $provincia - $so - $comentario";
	}
	
	$sql="SELECT * FROM alumnos WHERE provincia='LU' OR provincia='CO' ORDER BY provincia DESC, nome ASC";

	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_num_rows($resultado);//devolve o número de filas seleccionadas por unha SELECT
	echo "<p>a sentenza <strong>$sql</strong> devolve <strong>$numFilas</strong> filas</p>";
	echo "<p>Listamos as filas usando a función mysqli_fetch_array() </p>";

	while($fila=mysqli_fetch_array($resultado)) {
		echo "<br>{$fila['id']} - {$fila['nome']} - {$fila['nif']} - {$fila['clave']} - {$fila['sexo']} - {$fila['deportes']} - {$fila['provincia']} - {$fila['so']} - {$fila['comentario']}";
	}

	$sql="DELETE FROM alumnos WHERE provincia='CO'";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_affected_rows($c); //devolve o número de filas afectadas na ultima query (NON SELECT)
	echo "<p>A sentenza <strong>$sql</strong> eliminou $numFilas filas na táboa 'alumnos'</p>";

	$sql="UPDATE alumnos SET so='W10*MOS' WHERE provincia='LU'";

	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_affected_rows($c); //devolve o número de filas afectadas na ultima query (NON SELECT)
	echo "<p>A sentenza <strong>$sql</strong> actualizou $numFilas filas na táboa 'alumnos'</p>";


	echo "<p>Listado final total da táboa alumos</p>";
	$sql="SELECT * FROM alumnos ORDER BY provincia,nome";
	$resultado=@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_num_rows($resultado);//devolve o número de filas seleccionadas por unha SELECT
	echo "<p>a sentenza <strong>$sql</strong> devolve <strong>$numFilas</strong> filas</p>";

	while($fila=mysqli_fetch_row($resultado)) {
		list($id,$nome,$nif,$clave,$sexo,$deportes,$provincia,$so,$comentario)=$fila;
		echo "<br>$id - $nome - $nif - $clave - $sexo - $deportes - $provincia - $so - $comentario";
	}


	$sql="DELETE FROM alumnos WHERE provincia='CO'";
	@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql:<br><strong>$sql</strong>
								<br>Erro número:".mysqli_errno($c).
								"<br>Descrición erro:".mysqli_error($c).
								"</p>"
								);

	$numFilas=mysqli_affected_rows($c); //devolve o número de filas afectadas na ultima query (NON SELECT)
	echo "<p>A sentenza <strong>$sql</strong> eliminou $numFilas filas na táboa 'alumnos'</p>";


	mysqli_close($c);//pecha a conexión coa base de datos

	echo "<br><br><br><br>";



?>
</body>
</html>