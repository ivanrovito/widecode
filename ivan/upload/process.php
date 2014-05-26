<?php
require_once("conexion.php");
$foto="";
$foto=$_FILES["foto"]["name"];
$temp=$_FILES["foto"]["tmp_name"];
if(isset($_POST['foto'])){ $notify = $_POST['foto']; } //arregla el Undefined Index
echo "el archivo en el PC del cliente se llama: <strong>$foto</strong>";
echo "<br>";
echo "el archivo en el Servidor se llama <stron>$temp</strong>";


/*
echo "el nombre es ".$_GET['nom'];
echo "<br>";
echo "la foto es ".$_GET["foto"];
*/
?>