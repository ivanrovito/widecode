<?php
require_once("conexion.php");
$sql="insert into comentarios
values
(null, '".$_POST["nombre"]."','".$_POST["correo"]."','".$_POST["mensaje"]."','".$_POST["id_noticia"]."')
";
//echo $sql;
$res=mysql_db_query($bd,$sql,$con);
header("Location: detalle.php?id_noticia=".$_POST["id_noticia"]);

?>
