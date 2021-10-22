<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario</title>
	<link rel="stylesheet" href="css/10-calendario.css">
</head>
<body>
<div id="contenedor">

<?php
//xerar un calendario automático, do mes actual (curso)
function calcularMesAnterior($mes) {
	$mes--;
	if($mes<1) $mes=12; //se era xaneiro, paso a decembro do ano anterior
	return $mes;//devolvemos o cálculo do numero do mes anterior
}

function calcularMesSeguinte($mes) {
	$mes++;
	if($mes>12) $mes=1; //se era decembro, paso a xaneiro do ano seguinte
	return $mes;//devolvemos o cálculo do numero do mes anterior
}



//primeiro: calcular en qué día da semana cae o día 1 do mes en curso.

$diasMes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
//               0  1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12

$diasSemana = array("LU","MA","ME","XO","VE","SA","DO");

setlocale(LC_ALL, "galician");

//$mes= (int) strftime("%m"); //con esto sabemos o número de mes actual
//$ano= (int) strftime("%Y"); //con esto sabemos o ano actual

$mes= $_GET['mes'] ?? strftime("%m"); //se nos pasan parámetro mes, tomamos ese mes, e senon tomamos o mes actual

$mes=(int) $mes;//pasamos o mes de cadea a número

$ano= $_GET['ano'] ?? strftime("%Y"); //se nos pasan o parámetro ano, tomamos ese ano, e senon tomamos o ano acutal
$ano=(int) $ano; //pasamos o ano de cadea a enteiro

$diaActual= (int) strftime("%d"); //con esto sabemos o día actual do mes
$mesActual = (int) strftime("%m");
$anoActual = (int) strftime("%Y");

if($mes==2) {
	if( checkdate(2,29,$ano) ) {
		$diasMes[2]=29;
	}
}


$instanteDia1=mktime(0,0,0,$mes,1,$ano);
$diaSemDia1=(int) strftime("%u",$instanteDia1); //calcula en qué dia da semana cae o día 1 (en formato 													//numérico, 1 luns, 2 martes .... 7 domingo)

/*
var_dump($mes);
var_dump($ano);
var_dump($instanteDia1);
var_dump($diaSemDia1);
echo "<br>este mes ten $diasMes[$mes] dias";
*/

$nomeMes=utf8_encode(strftime("%B",$instanteDia1));

$mesAnt=calcularMesAnterior($mes);
$anoMesAnt= $mesAnt==12 ? $ano-1 : $ano;
$mesSeg=calcularMesSeguinte($mes);
$anoMesSeg= $mesSeg==1 ? $ano+1 : $ano;

echo "\n\t<div id='enlaces'>";
	echo "\n\t\t<a href='?mes=$mesAnt&ano=$anoMesAnt' title='Mes Anterior'> &lt;&lt;&lt; </a>";

	echo "\n\t<h3>$nomeMes $ano</h3>";

	echo "\n\t\t<a href='?mes=$mesSeg&ano=$anoMesSeg' title='Mes Seguinte'> &gt;&gt;&gt; </a>";
echo "\n\t</div>"; // peche do div id='enlaces'


echo "\n\t<div id='calendario'>";

foreach ($diasSemana as $nomeDia) {
	echo "\n\t\t<div>$nomeDia</div>";
}

$numColumna=0;
for ($i=1; $i < $diaSemDia1  ; $i++) { 
	$numColumna++;//calculo num columna que imos usar
	echo "\n\t\t<div></div>";
}

for ($i=1; $i <= $diasMes[$mes] ; $i++) { 
/*	
	if($i==$dia)
		echo "\n\t\t<div class='dia_actual'>$i</div>";	
	 else 
		echo "\n\t\t<div>$i</div>";	
*/
		$numColumna++;//

		$clases="";
		if($i==$diaActual && $mes==$mesActual && $ano==$anoActual) $clases="dia_actual ";
		if($numColumna==7){
			$clases.="dia_festivo ";
			$numColumna=0;
		}
		echo "\n\t\t<div class='$clases'>$i</div>";	

}

echo "\n\t</div>"; // peche do div id='calendario'

?>

</div>
	
</body>
</html>