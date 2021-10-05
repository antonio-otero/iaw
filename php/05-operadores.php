<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Operadores PHP</title>
</head>
<body>
	<h1>Operadores en PHP</h1>

<?php 
//operadores aritméticos + - * / %

$a=1;
$b=2;
$c=3;
echo "<br>\$a "; var_dump($a);
echo "<br>\$b "; var_dump($b);
echo "<br>\$c "; var_dump($c);

$r=$a+$b;
echo "<br>\$r a+b "; var_dump($r);

$r=$c-$a;
echo "<br>\$r c-a "; var_dump($r);

$r=$b*$c;
echo "<br>\$r b*c "; var_dump($r);

$r=$c/$b;
echo "<br>\$r c/b "; var_dump($r);

$r=$c%2;
echo "<br>\$r c%2 "; var_dump($r);




?>	

</body>
</html>