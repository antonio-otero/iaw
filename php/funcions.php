<?php 

/*****************************************/
/**** cálculo letra do dni ***************/
/*****************************************/
function letraDNI($ndni) {
	/* nos pasan un número de dni e calcula 
	   a letra que lle corresponde según algoritmo NIF
	*/

	$letras="TRWAGMYFPDXBNJZSQVHLCKE";
	//       01234567890123456789012
	//                 1         2

	$resto=$ndni % 23;
	$letra=$letras[$resto];
	return $letra;

}

function validarNif($nif) {
	$nif=strtoupper($nif);
	//12345678A

	$dni=substr($nif, 0, -1 );//extrae todos os caracteres de $nif agás o último
	$letra=substr($nif, -1);//extrae o último caracter 

	$letras="TRWAGMYFPDXBNJZSQVHLCKE";
	//       01234567890123456789012
	//                 1         2
	if(!is_numeric($dni)) { //comprobar que o dni é numérico
		return false;
	}

	if(is_numeric($letra)) {//comprobamos que a letra non é un número
		return false;
	}
	$resto=$dni % 23;
	$letraCalculada=$letras[$resto];

	if($letra==$letraCalculada) {
		return true;
	} else {
		return false;
	}
}



?>