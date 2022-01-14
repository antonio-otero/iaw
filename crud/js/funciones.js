function estasSeguro(id,nombre,apellidos) {
	var confirmacion=confirm("Estás seguro de borrar el registro de:\n" + nombre +" "+apellidos);
	if (confirmacion) {
		/* si se confirmó el borrado, redireccionamos a delete.php con el id del registro*/
		document.location.href="delete.php?id="+id;
	}
}