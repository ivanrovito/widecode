<?php

$file = $_FILES['nombre_input']; // registro en variable el file
$file_name = $_FILES['nombre_input']['name']; // Guardo el file name en variable
$file_size = $_FILES['nombre_input']['size']; // Guardo el file size en variable
$file_tmp = $_FILES['nombre_input']['tmp_name']; // Guardo el tmp_name en variable
$file_type = $_FILES['nombre_input']['type']; // Guardo el type en variable

// Defino una ruta donde se va a almacenar el archivo final
$path = "../ruta/";
// Generamos un nombre de imagen único por imagen con el timestamp y el nombre del archivo cambiando espacios por '-'
$final_name = time()."_".str_replace(' ','-', $file_name); 
//Definimos la ruta + imagen ej. ../ruta/archivo.pdf
$final_path = $path.$final_name; 
// Guardo en $move la respuesta del move_uploaded_file()
$move = @ move_uploaded_file($file_tmp, $final_path);

if(($file=="none") OR (empty($file_name))){
	//Si el file esta vacio o el file name esta vacio damos un error
	$error = '1';
	$msj_error = "No selecciono una foto.\nPor favor seleccione una para continuar.";
}elseif($file_size==0){
	//Si el tamaño del archivo es igual a 0 damos error
	$error = '1';
	$msj_error = "El archivo debe pesar al menos 1kb.";
}elseif($file_type != "image/jpeg"){
	//Si la extension no es jpeg damos error
	$error = '1';
	$msj_error = "Los formatos de imagen permitidos son: JPG.";
}elseif((!is_uploaded_file($file_tmp))){
	//Si la imagen ya esta subida al server damos error
	$error = '1';
	$msj_error = "Error interno";
}else{
	$error = '';
	$msj_error = "";
	
	if(!$move){
		$error = '1';
		$msj_error = "Error subiendo el archivo. Intentelo nuevamente.\nEsto puede deberse a que no se ha creado la carpeta del path.. ".$path;
	}else{
		//Si todo fue OK cargamos la imagen con el resto de los datos en la base de datos.
		//La imagen se va a subir a la base de datos con el nombre de img1 que es el que le dimos anteriormente con el timestamp-
		mysql_query("insert into TABLA values('','','','', '', '', '', '', '', '', '', '', '')");

		$error = '';
		$msj_error = '';
		$bien = '1';
		$msj_bien = 'El registro se cargo correctamente!';
	}
}

?>