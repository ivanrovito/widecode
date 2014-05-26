<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require_once("conexion.php");
$foto=$_FILES["foto"]["name"];
$temp=$_FILES["foto"]["tmp_name"];
$tamano=$_FILES["foto"]["size"];
$tipo=$_FILES["foto"]["type"];
if(isset($_POST['foto'])) //arregla el undefined index
{
	 $notify = $_POST['foto'];
} 

echo "el archivo en el PC del cliente se llama: <strong>$foto</strong>";
echo "<br>";
echo "el archivo en el Servidor se llama <strong>$temp</strong>";
echo "<br>";
echo "el tamaño en bytes del archivo es <strong>$tamano</strong>";
echo "<br>";
echo "el tipo del archivo es <strong>$tipo<type>";
echo "<hr>";

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
}
//***********************************************************************
//Ahora validamos la extension o el tipo de archivo
if ($tipo=="image/png" or $tipo=="image/jpeg")
{
//***********************************************************************
//Ahora podemos subir la imagen al servidor
switch($tipo) 
{
	case 'image/png':
		$ext=".png";
	break;
	case 'image/jpeg':
		$ext=".jpg";
	break;
}
//$nombre_foto=$_POST["nom"].$ext;
$nombre_foto=$_POST["nom"];
$nombre_foto=str_replace(" ","_",$nombre_foto);
$nombre_foto=$nombre_foto.$ext;
copy($temp, "upload/$nombre_foto");
//************************************
//Ahora guardamos el archivo en una tabla de la base de datos
$sql="insert into archivos values (null, '$nombre_foto')";
$res=mysql_db_query($bd,$sql,$con);
//con esto recuperamos el ultimoid ingresado en la base de datos
$id=mysql_insert_id($con);
//header("location: ver_imagen.php?id_archivo=".mysql_insert_id($con));
echo "<script type='text/javascript'>
window.location='ver_imagen.php?id_archivo=$id';
</script>";
}
else 
{
		?>		
		El archivo solo puede ser .png o .jpeg
		<br />
		<input type="button" value="Volver" title="Volver" onclick="history.back()" />
		<?php		
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