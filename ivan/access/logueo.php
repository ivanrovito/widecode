<?php
session_start();
require_once("conexion.php");
$sql="select user from usuarios where user='".$_POST["login"]."'";
$res=mysql_db_query($bd,$sql,$con);
if (mysql_num_rows($res)==0)
{
	echo "<script type='text/javascript'>
		alert('El usuario ".$_POST["login"]." no existe en la base de datos');
		window.location='index.php';	
	</script>";
}
else 
{
//Ahora preguntamos siel login y el password coinciden en la base de datos
$sql="select * from usuarios
where user='".$_POST["login"]."' and pass ='".$_POST["pass"]."'";
$res= mysql_db_query($bd,$sql,$con);
if (mysql_num_rows($res)==0)
{
	echo "<script type='text/javascript'>
		alert('El usuario y el pass ingresado no coinciden');
		window.location='index.php';	
	</script>";
}
else
{
//Ahora le damos acceso a nuestro contenido restringido
	$_SESSION["usuario"]=$_POST["login"];
	header("Location: contenidos.php");
}

}

?>