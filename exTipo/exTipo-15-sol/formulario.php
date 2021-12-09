<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
  <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
<h1 class="nombre">Pon aquí tu nombre y apellidos</h1>
<div id="formulario">
  <form action="formulario.php" method="post">
    <h2>Pedido de Pizza</h2>

    <fieldset>
      <legend>Datos envío</legend>
      <div class="datose">
          <label for="nom">Nombre:</label>
          <input type="Text" name="nom" size="40" maxlength="30" id="nom">
      </div>

      <div class="datose">
          <label for="dir">Dirección:</label>
        <input type="text" name="dir" size="50" maxlength="30" id="dir">
      </div>  
    </fieldset>

    <fieldset>
      <legend>Detalles pedido</legend>

      <div class="detallesp">
          <label class="rotulo">Ingredientes</label>
          <label for="queso"> Queso</label>
        <input type="CheckBox" name="ingre[]" value="Q" id="queso"><br>
          <label for="pimiento"> Pimiento</label>
        <input type="CheckBox" name="ingre[]" value="P" id="pimiento"><br>
          <label for="cebolla"> Cebolla</label>
        <input type="CheckBox" name="ingre[]" value="C" id="cebolla"><br>
      </div>

      <div class="detallesp">
        <label class="rotulo">Tamaño</label>
          <label for="peque"> Pequeña</label>
        <input type="Radio" name="tam" value="10" id="peque"><br>
          <label for="med"> Mediana</label>
        <input type="Radio" name="tam" value="12" id="med"><br>
          <label for="grand"> Grande</label>
        <input type="Radio" name="tam" value="16" id="grand"><br>
      </div>

      <div class="detallesp">
        <label for="ins">Instrucciones Especiales</label>
        <textarea name="ins" rows="5" id="ins" placeholder="Escribe aquí"></textarea>       
      </div>

    </fieldset>

    <fieldset>
      <legend>Forma de Pago</legend>

      <div class="datosp">
        <label for="fpago">Datos Pago:</label>
        <select name="fpago" size="1" id="fpago">
          <option value=""></option>
          <option value="1">Contado</option>
          <option value="2">Visa</option>
          <option value="3">Cheque</option>
        </select>
      </div>
        
    </fieldset>

    <p class="botones">
      <input type="submit" name="enviar" value="Enviar" >
        <input type="reset" value="Borrar">
    </p>

  </form>

  <?php 
  /* 
  Introducir aquí código php para grabar los datos del formulario en el archivo formulario.txt.
  cada vez que se acepta un formulario, se añade una fila al final del fichero con los datos de los
  campos separados por el carácter punto y coma (;). 
  Ten en cuenta que el campo 'ingre' es un array, y debemos grabar todos los valores que contenga. 
  Así por ejemplo si el contenido de ingre fuese :
  $ingre[0]='P', $ingre[1]='C'; grabaríamos la cadena 'PC' como contenido para este campo. 
  Al final de cada línea debemos grabar un salto de línea (\n).   
  */     

  $nom=$_POST["nom"]??"";
  $dir=$_POST["dir"]??"";
  $ingre=$_POST["ingre"]??array();
  $tam=$_POST["tam"]??"";
  $fpago=$_POST["fpago"]??"";
  $ins=$_POST["ins"]??"";

  //$enviado=isset($_POST["enviar"])?true:false;

  if ($_POST) {//foi enviado o formulario
    //if (!empty($nom) and !empty($dir) and !empty($ingre) and !empty($tam) and !empty($fpago) and !empty($ins)) {
    /*
    if($nom!="" and $dir!="" and count($ingre)>0 and $tam!="" and $fpago!="" and $ins!="" )  {
        echo "<h2 class='aceptado'>Formulario aceptado</h2><br>";
        $f1="formulario.txt";  
        $id_f1=@fopen($f1,"a") or die("El fichero $f1 no se ha podido abrir.");
        $ingredientes=implode("", $ingre);
        fwrite($id_f1,"$nom;$dir;$ingredientes;$tam;$fpago;$ins\n");
        fclose($id_f1);
    } else {
        echo "<h2 class='noaceptado'>Faltan campos por cubrir</h2><br>";
    }
    */
    if($nom=="" or $dir=="" or count($ingre)==0 or $tam=="" or $fpago=="" or $ins=="" )  {//falta algún campo
        echo "<h2 class='noaceptado'>Faltan campos por cubrir</h2><br>";

    }  else {
        echo "<h2 class='aceptado'>Formulario aceptado</h2><br>";
        $f1="formulario.txt";  
        $id_f1=@fopen($f1,"a") or die("El fichero $f1 no se ha podido abrir.");
        $ingredientes=implode("", $ingre);
        fputs($id_f1,"$nom;$dir;$ingredientes;$tam;$fpago;$ins\n");
        fclose($id_f1);

    }



  }



  ?> 

</div> <!-- fin de div id="formulario" -->
</body>
</html>

