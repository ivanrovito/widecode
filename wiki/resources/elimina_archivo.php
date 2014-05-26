<?
	if(file_exists('../ruta/archivo.ext)){
		unlink('../ruta/archivo.ext);
	} else {
		echo '<script>alert("Ocurrió un error inesperado. Código de error: EMPTIMGFRANDEL'.date('dmY').'");</script>';
	}
?>				
