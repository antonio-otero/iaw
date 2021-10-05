<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tipos de datos</title>
</head>
<body>
	<h1>Tipos de datos en PHP</h1>

<?php 
	//numéricos enteiros:

	$a=100;
	echo "\n<p>";
	echo "a variable <b>\$a</b> ten valor <b>$a</b>, e ou seu tipo é <b>";
	echo gettype($a);
	echo "</b></p>";

	//numéricos reais o en punto flotante
	$b=10.50;

	echo "\n<p>";
	echo "a variable <b>\$b</b> ten valor <b>$b</b>, e ou seu tipo é <b>";
	echo gettype($b);
	echo "</b></p>";

	//de cadea

	$c="cadea de texto";

	echo "\n<p>";
	echo "a variable <b>\$c</b> ten valor <b>'$c'</b>, e ou seu tipo é <b>";
	echo gettype($c);
	echo "</b></p>";

	//matrices ou arrays
	//hai varias formas de definir un array:
	//a seguinte e a de poñer en cada índice o seu valor: 
	$vSemana[0]=10;
	$vSemana[1]=14.5;
	$vSemana[2]=31;
	$vSemana[3]=100;
	$vSemana[4]=34;
	$vSemana[]=66; //se omitimos o índice, se xera automaticamente
	$vSemana[]="88";

	echo "\n<p>";
	echo "a variable <b>\$vSemana</b> é de tipo <b>";
	echo gettype($vSemana);
	echo "</b> e sua composición é:<br/>";
	var_dump($vSemana);//a función var_dump se usa para depuración de código, mostra toda a información de tipo e valor dunha variable.
	echo "</p>";

	echo "\n<h3>Valores do array \$vSemana:</h3>";
	//mostramos os valores do array nunha lista desordenada, usando a función for
	echo "\n<ul>";
	for ($i=0; $i <= 6 ; $i++) { 
		echo "\n\t<li>";
		echo "No índice $i temos o valor ";
		echo $vSemana[$i];
		echo "</li>";
	}
	echo "\n</ul>";

	//mostramos os valores do array nunha lista ordenada, usando a función foreach	
	echo "\n<ol>";
	foreach ($vSemana as $indice => $valor) {
		echo "\n\t<li>";
		echo "No índice $indice temos o valor $valor";
		echo "</li>";
	}
	echo "\n</ol>";

	//outra maneira de declarar un array con índices numéricos é:

	$vSemana = array(11,15.5,32,101,35,67,"89");
	// índices:      0  1    2  3   4  5  6      se asignan por orde , comezan en 0

	echo "\n<hr><p>";
	var_dump($vSemana);
	echo "</p>";

	$diasSemana = array("Luns","Martes","Mércores","Xoves","Venres","Sábado","Domingo");
	//                    0      1          2         3       4         5        6

	echo "\n<h3>Días da semana</h3>";

	echo "\n<ul>";

	foreach ($diasSemana as $key => $value) {
		echo "\n\t<li>";
		echo "posición $key valor $value";
		echo "</li>";
	}

	echo "\n</ul>";

	//arrays asociativos -> con índices de texto (cadea / string)

	$ventasSemana["luns"]=200;
	$ventasSemana["martes"]=166;
	$ventasSemana["mércores"]=323;
	$ventasSemana["xoves"]=876;
	$ventasSemana["venres"]=999;
?>	
	<h3>Arrays asociativos</h3>
	<p>
<?php  
	var_dump($ventasSemana);
?>		
	</p>
	<h3>Ventas da semana</h3>
	<ol>
<?php 
	foreach ($ventasSemana as $key => $value) {
		echo "\n\t\t<li>$key = $value €</li>";
	}
?>	
	</ol>

<?php 
	//tamén podemos declarar arrays asociativos coa función array:
	$ventasSemana = array('luns'=>200,
						  'martes'=>166,
						  'mércores'=>323,
						  'xoves' =>876,
						  'venres'=>999);


	//podemos tratar unha cadea como un array:

	$nome="Luis";

	echo "\n<h3>Tratamos cadea como array</h3>";

	echo "\n<p>Temos a cadea <b>$nome</b>, e podemos separar os caracteres: ";
	echo "$nome[0] - $nome[1] - $nome[2] - $nome[3]";
	echo "</p>";


	//arrays multidimensionais:

	$ventasSemanaMT["luns"]["mañá"]=50;
	$ventasSemanaMT["luns"]["tarde"]=40;
	$ventasSemanaMT["martes"]["mañá"]=60;
	$ventasSemanaMT["martes"]["tarde"]=55;
	$ventasSemanaMT["mércores"]["mañá"]=33;
	$ventasSemanaMT["mércores"]["tarde"]=35;
	$ventasSemanaMT["xoves"]["mañá"]=77;
	$ventasSemanaMT["xoves"]["tarde"]=57;
	$ventasSemanaMT["venres"]["mañá"]=69;
	$ventasSemanaMT["venres"]["tarde"]=58;

	echo "\n<h3>Arrays multidimensionais</h3>";

	echo "\n<p>";
	echo "\$ventasSemanaMT:";
	var_dump($ventasSemanaMT);
	//forma equivalente usando constructor array;

	$ventasSemanaMT2 = array(
		'luns' => array('mañá'=>50,'tarde'=>40), 
		'martes' => array('mañá'=>60,'tarde'=>55), 
		'mércores' => array('mañá'=>33,'tarde'=>35), 
		'xoves' => array('mañá'=>77,'tarde'=>57), 
		'venres' => array('mañá'=>69,'tarde'=>58) 
	);
	echo "<br><br>\$ventasSemanaMT2:";
	var_dump($ventasSemanaMT2);

	echo "\n<ul>";
	foreach ($ventasSemanaMT as $key => $value) {
		echo "\n\t<li>$key</li>";
		echo "\n\t<ul>";
		foreach ($value as $key => $valorFinal) {
			echo "\n\t\t<li>$key: $valorFinal €</li>";
		}
		echo "\n\t</ul>";
	}
	echo "\n</ul>";

	echo "\n</p>";

	//os arrays multidimensionais só se expanden dentro dunha cadea se se encerran entre chaves {} :

	echo "\n<p>Ventas do luns á mañá: {$ventasSemanaMT['luns']['mañá']}</p>";

	//se non queremos usar chaves, podemos concatenar co caracter .

	echo "\n<p>Ventas do luns á mañá: ".$ventasSemanaMT['luns']['mañá']."</p>";




?>

</body>
</html>