<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ámbito variables</title>
</head>
<body>
	<h1>Ámbito variables</h1>

<?php  
	$a=100; //variable global

	function proba1() {
		$b=200; //variable local da función proba
		echo "<p>(fp1) Valor de \$b > $b</p>";
		echo "<p>(fp1) Valor de \$a > $a</p>";

	}

	echo "<p>(g) Valor de \$a > $a</p>";
	proba1();
	echo "<p>(g) Valor de \$b > $b</p>";


/////////////////////////////////////////////////////


	function proba2() {
		global $a;// así temos acceso á variable global $a
		$b=200; //variable local da función proba
		echo "<p>(fp2) Valor de \$b > $b</p>";
		echo "<p>(fp2) Valor de \$a > $a</p>";

	}

	proba2();


	/* definición de constantes */


	define('PI', 3.141592);
	define('EURO', 166.386);

	$euros=6;
	$pesetas=$euros*EURO;

	echo "<p>";
	echo "$euros euros son $pesetas pesetas";
	echo "</p>";



?>
</body>
</html>