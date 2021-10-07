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

echo "\n<hr>Operadores de asignación<hr>";

//Operadores de asignación =  += -= *= /= .=

// o operador = de asignación 'reescribe' o contido da variable que ten a esquerda

$a=10;
$a=12; //se perde o valor anterior de $a
echo "<br>\$a "; var_dump($a);
//operador += suma o resultado á variable da esquerda
$a+=2; // equivalente $a=$a+2;
echo "<br>\$a "; var_dump($a);

$a-=1; // equivalente $a=$a-1 , equivalente a $a--;
echo "<br>\$a "; var_dump($a);

$a*=2; // equivalente $a=$a*2;
echo "<br>\$a "; var_dump($a);

$a/=2; // equivalente $a=$a/2;
echo "<br>\$a "; var_dump($a);

$nome="Ana";
$nome.=" Fernández"; //equivalente $nome=$nome." Fernández";
echo "<br>\$a "; var_dump($nome);
 // operadores de comparación ==, !=, <, >, <= y >=

if ($a==13) {
	echo "<br>\$a ten valor 13 ($a)";
}
if ($a!=100) {
	echo "<br>\$a non ten valor 100 ($a)";
}

if ($a>$c) {
	echo "<br>\$a ($a) é maior que \$c ($c) ";
}

if ($a<=$c) {
	echo "<br>\$a ($a) é menor ou igual que \$c ($c) ";	
} else {
	echo "<br>\$a ($a) non é menor ou igual que \$c ($c) ";	
}

echo "<br> a condición \$a==13 é ";
echo $a==13;

echo ($a==13) ? "<br>\$a vale 13 ($a)" : "<br>\$a non vale 13 ($a)";
$a=10;
echo ($a==13) ? "<br>\$a vale 13 ($a)" : "<br>\$a non vale 13 ($a)";

//Operadores de incremento y decremento ++ e --
//incrementan o decrementan nunha unidade a varible que se lle aplica

$a++;
echo "<br>o valor de \$a despois de facer un \$a++ é <b>$a</b>";
$a++;
echo "<br>o valor de \$a despois de facer un \$a++ é <b>$a</b>";
$a--;
echo "<br>o valor de \$a despois de facer un \$a-- é <b>$a</b>";

echo "<br>O valor de \$a é <b>$a</b>";
$resultado = 10 + $a++; //equivalente a : $resultado = 10 + $a; $a++;
echo "<br>O valor de \$resultado despois de \$resultado = 10 + \$a++ é <b>$resultado</b>";
echo "<br>O valor de \$a é <b>$a</b>";

$a=11;
echo "<br>O valor de \$a é <b>$a</b>";
$resultado = 10 + ++$a; //equivalente a : $a++; $resultado = 10 + $a;
echo "<br>O valor de \$resultado despois de \$resultado = 10 + ++\$a é <b>$resultado</b>";
echo "<br>O valor de \$a é <b>$a</b>";

// ollo, se ++ ou -- vai pola esquerda da variable, ten prioridade antes do resto de operacións
// se vai pola dereita, se calcula ao final e non afecta ao resultado da expresión o incremento ou decremento

//Operadores lógicos 
/*
 Y lógico: && o and 
 O lógico: || o or 
 O exclusivo: xor
 NO lógico: !
*/
$a = 1;
$b = 2;
$c = 3;
echo "<br>\$a "; var_dump($a);
echo "<br>\$b "; var_dump($b);
echo "<br>\$c "; var_dump($c);

if ( $c>$a && $c>$b ) {
	echo "<br>$c>$a e ademáis $c>$b";
}
//se pode usar and en lugar de &&
if ( $c>$a and $c>$b ) {
	echo "<br>$c>$a e ademáis $c>$b";
}

if ( $c>$a || $c==$b ) {
	echo "<br>$c>$a ou $c==$b";
} 
//se pode usar or en lugar de ||
if ( $c>$a or $c==$b ) {
	echo "<br>$c>$a ou $c==$b";
} 

if ( !($c==$b) ) {
	echo "<br>$c non é igual a $b";
} else {
	echo "<br>$c é igual a $b";
}

//se poden concatenar máis de duas condicións

if ( ($c>=$b && $c>=$a) || $c<=2 ) {
	echo "<br> ($c>=$b && $c>=$a) || $c<=$a";
}

//operador de contatenación de cadeas, operador punto : '.'

echo "<br> \$a + \$b = ".($a+$b)." e \$a x \$b = ".($a*$b)."<br>";



?>	

</body>
</html>