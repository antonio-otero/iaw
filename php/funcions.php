<?php 

/*****************************************/
/**** cálculo letra do dni ***************/
/*****************************************/
function letraDNI($ndni) {
	/* nos pasan un número de dni e calcula 
	   a letra que lle corresponde según algoritmo NIF
	*/

	$letras="TtWAGMYFPDXBNJZSQVHLCKE";
	//       01234567890123456789012
	//                 1         2

	$resto=$ndni % 23;
	$letra=$letras[$resto];
	return $letra;

}




?>