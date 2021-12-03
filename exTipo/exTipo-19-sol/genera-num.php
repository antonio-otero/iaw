<html>
<head>
	<title>Generador de números</title>
	<style type="text/css" media="screen">
		._nombre {color:red; text-align: center; border:3px dotted red; width: 50%; margin:50px auto;}
		._titulo {color:blue; text-align: center; width: 50%; margin:auto;}

		.limpiar {
			clear:both;
			height: 20px;
		}
		.azul {color:blue;}
		.rojo {color:red;}
		#contenedor {
			width: 90%;
			margin: 20px auto;
			text-align: center;
		}
		* {box-sizing:border-box;}
		.numero{
			width: 10%; /* Esto hace que salgan 10 números por línea, 1000px/100px */
			font-size: 32px;
			float: left;
		}
		.volver {
			text-align: center;
		}
		
	</style>
</head>
<body>
	<h2 class="_nombre">Pon aquí tu nombre y apellidos</h2>
	<h3 class="_titulo">Lista de Números solicitados</h3>     
	<?php
	// código PHP
	$desde= $_GET["desde"] ?? "";
	$hasta= $_GET["hasta"] ?? "";
	$inc= $_GET["inc"] ?? "";
	$color="azul"; //empezamos en azul

	//var_dump($desde,$hasta,$inc);

	?>

	<div id="contenedor">
		
		<?php 
		$error=false;
		if ($desde=="" or $hasta=="" or $inc=="") {
			echo "<h2 class='rojo'>Error: Faltan datos</h2>";
		} elseif ($inc<0) {
				for ($numero=$desde; $numero >=$hasta ; $numero+=$inc) { 
					echo "\n\t<div class='numero $color'>$numero</div>";
					$color=$color=="azul"?"rojo":"azul"; //alternancia de colores, azul - rojo
				}	
		} else {
				for ($numero=$desde; $numero <=$hasta ; $numero+=$inc) { 
					echo "\n\t<div class='numero $color'>$numero</div>";
					$color=$color=="azul"?"rojo":"azul"; //alternancia de colores, azul - rojo
				}
		}
		

	?>

	<div class="limpiar"></div>
	<div class="volver">
		<a href="genera-num.html">[VOLVER]</a>
	</div>
</div>

</body>
</html>