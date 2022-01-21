<?php session_start();//indica a php que vamos a trabajar con variables de sesión.// estas se guardan en el array $_SESSION y además en una cookie del navegado//$_SESSION["nombre"]="Antonio"; //con esto creamos la variable de sesión 'nombre'//esto se guardará además en el navegador del cliente en una cookie.//$_SESSION=[]; // esto borra todas las variables de seión ?><!DOCTYPE html><html lang="es"><head>	<meta charset="UTF-8">	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>CRUD Alumnos</title>	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">	<link rel="stylesheet" href="css/estilos.css"></head><body>    <?php require "misfunciones.php"     // misfunciones contiene session_start() para trabajar con varialbes de sesión en todas las páginas.    ?>	<?php require "menu.php" ?>	<div class="container">		<div class="row">			<div class="col-xs-12 table-responsive">				<?php require "control-crud.php" ?>			</div>		</div>	</div>	<script src="js/funciones.js"></script></body></html>