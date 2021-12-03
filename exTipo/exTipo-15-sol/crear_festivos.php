<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear festivos</title>
</head>
<body>
<?php 

require("datos-conexion.php");
$baseDatos="iaw21-22";
/* Establecemos conexi?n con el servidor de base de datos: */
$c=@mysqli_connect($servidor,$usuario,$clave)
  or die ("<p>Error al conectar con el servidor de base de datos $servidor</p>");

echo "<p>Se ha establecido conexión con servidor de base de datos $servidor</p>";


/* Creamos la base de datos $baseDatos en caso de no existir  */
$sql="CREATE DATABASE IF NOT EXISTS  `$baseDatos` COLLATE 'utf8_general_ci'";
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al crear la base de datos $baseDatos</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<p>Se ha creado la base de datos $baseDatos (si no existía)<p>";

/* Seleccionamos la base de datos con la que queremos trabajar */
@mysqli_select_db($c,"$baseDatos")
    or die ("<p>Error al seleccionar la base de datos $baseDatos</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<p>Se ha seleccionado la base de datos $baseDatos en el servidor $servidor</p>";

$sql ="DROP TABLE IF EXISTS festivos"; //borramos si ya existe la tabla.
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al ejecutar la sentencia SQL: $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");
echo "<br>Tabla festivos eliminada (si existía antes)";

$sql = "CREATE TABLE festivos
            (ano_mes CHAR(7) NOT NULL,
             dias_festivos INT,
             KEY (ano_mes) );";
             
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al crear la tabla 'festivos': $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<br>Tabla festivos creada";

$sql = "INSERT INTO festivos VALUES

                    ('2021-1',1),
                    ('2021-1',6),
                    ('2021-2',15),
                    ('2021-3',19),
                    ('2021-4',1),
                    ('2021-4',2),
                    ('2021-5',1),
                    ('2021-5',17),
                    ('2021-6',3),
                    ('2021-7',25),
                    ('2021-10',12),
                    ('2021-11',1),
                    ('2021-12',6),
                    ('2021-12',8),
                    ('2021-12',25),

                    ('2022-1',1),
                    ('2022-1',6),
                    ('2022-2',7),
                    ('2022-3',24),
                    ('2022-3',25),
                    ('2022-4',14),
                    ('2022-4',15),
                    ('2022-5',17),
                    ('2022-7',25),
                    ('2022-8',15),
                    ('2022-10',12),
                    ('2022-11',1),
                    ('2022-12',6),
                    ('2022-12',8),
                    ('2022-12',25);";

$result=@mysqli_query($c, $sql)
    or die ("<p>Error al ejecutar la sentencia SQL: $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<h2>los días festivos del 2021 y 2022 fueron añadidos a tabla festivos</h2>";
                    

mysqli_close($c);
      
 ?> 

 
</body>
</html>
