<?php
	session_start();
	require "misfunciones.php";//aquí tenemos funciones de base de datos

	if(!isset($_SESSION['email'])) {//si no estamos logueados
		header('Location: index.php'); //esto redirecciona a la página indicada;
		die();//finalizamos ejecución script acutal;
	}

	$id=$_GET["id"] ?? "";

	$sql="DELETE FROM alumnos2 WHERE registro=$id";

	if(is_numeric($id)) { //evito inyecciones SQL
		$c=conectarBaseDatos();
		$result=enviarConsulta($c,$sql);
	}

	header('Location: index.php'); //esto redirecciona a la página inicial

?>
