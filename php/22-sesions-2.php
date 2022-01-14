<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Sesións PHP</title>
</head>
<body>
	<?php 	
		if(!isset($_SESSION["usuario"])) 
			die("<p>Non tes permisos para entrar nesta páxina</p>");

	?>
	<h1>Aparado (1) solo para usuarios identificados</h1>

	<p>Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Neque expedita, explicabo recusandae id odit, voluptate quod. Molestiae quasi quia quisquam voluptates cum, tempora, inventore aspernatur dolorum, magni perspiciatis itaque voluptas?	</p>

	<p>	
		<a href="22-sesions.php">Volver</a>
	</p>

</body>
</html>