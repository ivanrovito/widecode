<?php
require_once("conexion.php");
$foto="";
$foto=$_FILES["foto"]["name"];
$temp=$_FILES["foto"]["tmp_name"];
$tamano=$_FILES["foto"]["size"];
$tipo=$_FILES["foto"]["type"];
if(isset($_POST['foto'])){ $notify = $_POST['foto']; } //arregla el Undefined Index
//**********************************************************************
//Ahora validamos que el tamaño del archivo sea el que necesitamos

$kilobytes=$tamano/1024;//cant en kb
//$mega=$kilobytes/1024;
if ($kilobytes > 300)
{
		?>		
		El archivo subido supera los 300 Kb
		<br />
		<input type="button" value="Volver" title="Volver" onclick="history.back()" />
		<?php		
}else 
{
	echo "Todo ok";
}		

/*
echo "el archivo en el PC del cliente se llama: <strong>$foto</strong>";
echo "<br>";
echo "el archivo en el Servidor se llama <strong>$temp</strong>";
echo "<br>";
echo "el tamaño en bytes del archivo es <strong>$tamano</strong>";
echo "<br>";
echo "el tipo del archivo es <strong>$tipo<type>";
echo "<hr>";
*/


/*
echo "el nombre es ".$_GET['nom'];
echo "<br>";
echo "la foto es ".$_GET["foto"];
*/
?>