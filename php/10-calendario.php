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

//primeiro: calcular en qué día da semana cae o día 1 do mes en curso.

$diasMes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
//               0  1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12

$diasSemana = array("LU","MA","ME","XO","VE","SA","DO");

setlocale(LC_ALL, "galician");
$mes= (int) strftime("%m"); //con esto sabemos o número de mes actual
$ano= (int) strftime("%Y"); //con esto sabemos o ano actual

$instanteDia1=mktime(0,0,0,$mes,1,$ano);
$diaSemDia1=(int) strftime("%u",$instanteDia1); //calcula en qué dia da semana cae o día 1 (en formato 													//numérico, 1 luns, 2 martes .... 7 domingo)

/*
var_dump($mes);
var_dump($ano);
var_dump($instanteDia1);
var_dump($diaSemDia1);
echo "<br>este mes ten $diasMes[$mes] dias";
*/

$nomeMes=strftime("%B",$instanteDia1);
echo "\n\t<h3>$nomeMes $ano</h3>";
echo "\n\t<div id='calendario'>";

foreach ($variable as $key => $value) {
	// code...
}


echo "\n\t</div>" // peche do div id='calendario'
?>

</div>


<div id="contenedor">
	<h3>Outubro 2021</h3>
	<div id="calendario">
		<div>LU</div>	
		<div>MA</div>	
		<div>ME</div>	
		<div>XO</div>	
		<div>VE</div>	
		<div>SA</div>	
		<div>DO</div>	

		<div></div>
		<div></div>
		<div></div>
		<div></div>

		<div>1</div>
		<div>2</div>
		<div>3</div>
		<div>4</div>
		<div>5</div>
		<div>6</div>
		<div>7</div>
		<div>8</div>
		<div>9</div>
		<div>10</div>
		<div>11</div>
		<div>12</div>
		<div>13</div>
		<div>14</div>
		<div>15</div>
		<div>16</div>
		<div>17</div>
		<div>18</div>
		<div class="dia_actual">19</div>
		<div>20</div>
		<div>21</div>
		<div>22</div>
		<div>23</div>
		<div>24</div>
		<div>25</div>
		<div>26</div>
		<div>27</div>
		<div>28</div>
		<div>29</div>
		<div>30</div>
		<div>31</div>


	</div>
</div>


	
</body>
</html>