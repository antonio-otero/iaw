<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Calendario mes actual</title>
	<link rel="stylesheet" href="css/calendario-festivos.css">
</head>
<body>
<?php 

//funcion que devuelve un array con los festivos para un mes, del mes y a?o que se pasa como par?metro

function dias_festivos($ano,$mes) {
    //conexion servidor base datos
	require("datos-conexion.php");
	$baseDatos="iaw21-22";
    /* Establecemos conexi?n con el servidor de base de datos: */
	$c=@mysqli_connect($servidor,$usuario,$clave,$baseDatos)
  	or die ("<p>Error al conectar con el servidor de base de datos $servidor</p>");

    $sql = "Select dias_festivos from festivos where ano_mes='$ano-$mes';";

	$result=@mysqli_query($c, $sql)
	    or die ("<p>Error al ejecutar la sentencia SQL: $sql</p>
	        <p>Error n?mero:".mysqli_errno($c)."</p>
	        <p>".mysqli_error($c)."</p>");
	/*    
    for ($i=1;$i<=31;$i++) {
    	$df[$i]=0; //en principio ning?n festivo
    }
    */
    //o for fai o seguinte array:
	//$df = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);	

    $df = array();//array para gardar os d?as festivos, como valor
    while($fila = mysqli_fetch_row($result))
    {
        //$df[$fila[0]]=1;
        $df[]=$fila[0];
    }
    mysqli_close($c);
	return $df; //retorna array con 1 en las posiciones de dias festivos
}

setlocale(LC_ALL, "spanish"); //galician para galicia e galego
$diasSem=array("Lu","Ma","Mi","Ju","Vi","Sa","Do");
//				 0   1    2    3    4    5    6    
$diasMes=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
//			   0  1  2  3  4  5  6  7  8  9 10 11 12					


$diaActual= (int) strftime("%d"); // dia actual en n?mero decimal 1-12
$mesActual= (int) strftime("%m"); // mes actual en n?mero decimal 1-12
$anoActual= (int) strftime("%Y"); // a?o actual con 4 d?gitos

$mes=isset($_GET["mes"])?$_GET["mes"]:$mesActual;
$ano=isset($_GET["ano"])?$_GET["ano"]:$anoActual;


if(checkdate(2, 29, $ano)) //devuelve true si existe el 29 de feb
	$diasMes[2]=29; //reescribimos dias de febreo si a?o es bisiesto


//Momento Unix del d?a 1 del mes actual:
$momentoDia1=mktime(0,0,0,$mes,1,$ano); 

$nombreMes=strftime("%B",$momentoDia1); // nombre del mes en curso

$diaComienzaMes=strftime("%w",$momentoDia1);
//devuelve de 0 a 6, 0 domingo, 1 lunes ... 6 s?bado


if ($diaComienzaMes==0) 
	$diaComienzaMes=7; // forzamos a 7 si comienza el mes en domingo


$anoAnt=$ano;
$anoSig=$ano;

$mesAnt=$mes-1;
if ($mesAnt==0) { //si el mes actual es enero
	$mesAnt=12;   // el mes anterior ser? diciembre del a?o anterior
	$anoAnt=$ano-1; // por lo que restamos una unidad al a?o
}

$mesSig=$mes+1;
if ($mesSig==13) { // si el mes actual es diciembre
	$mesSig=1;     // el mes siguiente ser? enero del pr?ximo a?o
	$anoSig=$ano+1;// por lo que sumamos una unidad al a?o
}

$df=dias_festivos($ano,$mes); //consultamos los festivos del mes que vamos a representar
//var_dump($df);
?>	

<div id="contenedor">
	<h1 id="mes"><?php echo "$nombreMes - $ano" ?></h1>	
	<div id="mant" class="mantsig">
		<a href="<?php echo "calendario-festivos.php?mes=$mesAnt&ano=$anoAnt" ?>">&lt;&lt;- Mes ant.</a></div>
	<div id="msig" class="mantsig">
		<a href="<?php echo "calendario-festivos.php?mes=$mesSig&ano=$anoSig" ?>">Mes sig. -&gt;&gt;</a></div>
	<br class="limpar">
<!--
	<div class="dia cab">Lu</div>
	<div class="dia cab">Ma</div>
	<div class="dia cab">...</div>

	<div class="dia cab">Do</div>
-->	
<?php 
	/* Este c?digo php genera la estructura comentada anterior*/
	foreach ($diasSem as $nombreDia) {
		echo "\n\t<div class='dia cab'>$nombreDia</div>";
	}

	//$contadorDias=0; //cuenta d?as desde lunes
	for ($saltos=1; $saltos<=$diaComienzaMes-1; $saltos++) {
		//$contadorDias++;
		echo "\n\t<div class='dia'>&nbsp;</div>";
	}

	for ($dia=1; $dia<=$diasMes[$mes]; $dia++) {
		$clase="";
/*		$contadorDias++;
		if($contadorDias==7){
			$clase="domingo";
			$contadorDias=0;
		}*/
		if (strftime("%w",mktime(0,0,0,$mes,$dia,$ano))==0) //hace el trabajo de $contadorDias
			$clase="domingo";
		if($diaActual==$dia and $mesActual==$mes & $anoActual==$ano) {
		 	$clase.=" diaActual";
		}
		//if ($df[$dia]) {
		if (in_array($dia, $df)) {//busca si existe $dia en el array $df (festivos)
			$clase.=" festivo"; 
		}
		echo "\n\t<div class='dia $clase'>$dia</div>";
	}
 ?>
</div>
</body>
</html>