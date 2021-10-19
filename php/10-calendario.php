<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario</title>
</head>
<body>
<?php
//xerar un calendario automático, do mes actual (curso)

//primeiro: calcular en qué día da semana cae o día 1 do mes en curso.

$diasMes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
//               0  1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12

setlocale(LC_ALL, "galician");
$mes= (int) strftime("%m"); //con esto sabemos o número de mes actual
$ano= (int) strftime("%Y"); //con esto sabemos o ano actual

$instanteDia1=mktime(0,0,0,$mes,1,$ano);
$diaSemDia1=(int) strftime("%u",$instanteDia1);//calcula en qué dia da semana cae o día 1 (en formato numérico, 1 luns, 2 martes .... 7 domingo)

var_dump($mes);
var_dump($ano);
var_dump($instanteDia1);
var_dump($diaSemDia1);
echo "<br>este mes ten $diasMes[$mes] dias";



?>
	
</body>
</html>