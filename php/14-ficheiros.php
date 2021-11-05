<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Ficheiros en PHP</title>
	<link rel="stylesheet" href="css/14-ficheiros.css">
</head>
<body>
	<h1>Ficheiros en PHP</h1>
	<h3>Lectura de ficheiro csv por liñas completas</h3>
<?php
	$ficheiro="datos/datos1.csv";
	$cf=@fopen($ficheiro, "r") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	//$cf será o controlador de ficheiro. A partir de aquí temos que usar $cf para operacións sobre o ficheiro

	$rexistro=fgets($cf);
	//a función feof devolve verdadeiro cando se chega ao final do ficheiro que se está a ler
	while (!feof($cf)) {//mentres non é final de ficheiro
		echo "<br>$rexistro";
		$rexistro=fgets($cf);
	}	
	fclose($cf);
	?>

	<h3>Lectura de ficheiro csv por campos</h3>
<?php
	$ficheiro="datos/datos1.csv";
	$cf=@fopen($ficheiro, "r") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	//$cf será o controlador de ficheiro. A partir de aquí temos que usar $cf para operacións sobre o ficheiro

	$rexistro=fgets($cf);
	//a función feof devolve verdadeiro cando se chega ao final do ficheiro que se está a ler
	while (!feof($cf)) {//mentres non é final de ficheiro
		$campos=explode(";", $rexistro);
		//echo "<br>$campos[0] $campos[1] $campos[2] $campos[3] ";
		list($nome, $apelidos, $email, $tfno)=$campos;
		echo "<br>$nome $apelidos $email $tfno";
		$rexistro=fgets($cf);
	}	
	fclose($cf);
	?>


	<h3>Lectura de ficheiro csv por campos e presentado nunha táboa html (table)</h3>

	<table>	
		<tr>
			<th>Nome</th>
			<th>Apelidos</th>
			<th>E-mail</th>
			<th>Teléfono</th>
		</tr>	

	<?php
	$ficheiro="datos/datos1.csv";
	$cf=@fopen($ficheiro, "r") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	$rexistro=fgets($cf);
	while (!feof($cf)) {//mentres non é final de ficheiro
		$campos=explode(";", $rexistro);
		list($nome, $apelidos, $email, $tfno)=$campos;
		//xerar a fila de táboa cos datos deste rexistro:
		echo "\n\t\t<tr>";
		echo "\n\t\t\t<td>$nome</td>";
		echo "\n\t\t\t<td>$apelidos</td>";
		echo "\n\t\t\t<td>$email</td>";
		echo "\n\t\t\t<td>$tfno</td>";
		echo "\n\t\t</tr>";

		$rexistro=fgets($cf);
	}	
	fclose($cf);
?>
	</table>	


	<h3>Escribir datos nun ficheiro csv</h3>

	<?php
	$ficheiro="datos/datos1.csv";
	$cf=@fopen($ficheiro, "a") or die("<p class='erro'>Erro, o ficheiro '$ficheiro' non existe!!</p>");
	//o modo 'a' engade ao final do arquivo
	//o modo 'w' non respeta os datos do arquivo, borra e comeza de novo.

	fputs($cf,"Adrián;Gómez Paz;adrian@gmail.com;612345678\n");

	fclose($cf);
?>


</body>
</html>