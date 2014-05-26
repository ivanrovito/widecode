<?php
session_start();
	session_unregister("usuario");
		session_destroy();
		//devuelvo el usuario al formulario
		header("Location: index.php")
		
		
		
?>