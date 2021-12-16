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
		.verde {color: green;}
		.gris {color: grey;}
		#contenedor {
			width: 90%;
			margin: 20px auto;
			text-align: center;
		}
		* {box-sizing:border-box;}
		.numero{
			width: 12.5%; /* Esto hace que salgan 10 números por línea, 1000px/100px */
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
	$colores=array("azul","rojo","verde","gris");
				//  0      1      2       3
	$nColor=0;//empezamos en color de índice 0 = azul $colores[$ncolor]


	//var_dump($desde,$hasta,$inc);

	?>

	<div id="contenedor">
		
		<?php 
		$error=false;
		if ($desde=="" or $hasta=="" or $inc=="") {
			echo "<h2 class='rojo'>Error: Faltan datos</h2>";

		} elseif($inc==0) {
			echo "<h2 class='rojo'>Error: el incremento no puede ser cero</h2>";

		} elseif ($inc<0) {
				for ($numero=$desde; $numero >=$hasta ; $numero+=$inc) {
					$color=$colores[$nColor];
					echo "\n\t<div class='numero $color'>$numero</div>";
					$nColor++;
					if($nColor>3) $nColor=0;

				}	
		} else {
				for ($numero=$desde; $numero <=$hasta ; $numero+=$inc) { 
					$color=$colores[$nColor];
					echo "\n\t<div class='numero $color'>$numero</div>";
					$nColor++;
					if($nColor>3) $nColor=0;
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