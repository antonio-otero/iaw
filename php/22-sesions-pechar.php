<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Peche de sesión</title>
</head>
<body>
	<?php
	$_SESSION=[];//se borran todas as variables de sesión

	?>

	<p>Se pechou a sesión</p>	
	<p><a href="22-sesions.php">VOLVER</a></p>
</body>
</html>