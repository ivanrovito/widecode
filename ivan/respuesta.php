<?php
/*
este es un comentario dentro de PHP
*/
//Este tambien es un comentario
/*
$saludo = "Hola Iv&aacute;n";
$numero = 60000; 
echo $numero;
*/
/*
$nom=$_POST["nom"];
$ap=$_POST["ap"];
$pais=$_POST["pais"];
*/
/*
$nom=$_GET["nom"];
$ap=$_GET["ap"];
$pais=$_GET["pais"];
*/
$nom=$_REQUEST["nom"];
$ap=$_REQUEST["ap"];
$pais=$_REQUEST["pais"];

echo "nombre=$nom<br>apellido=$ap<br>pais=$pais";
?>
