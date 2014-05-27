<?php
require_once("conexion.php");
$sql="select * from archivos where id_archivo=".$_GET["id_archivo"]."";
$res=mysql_db_query($bd,$sql,$con);
if($reg=mysql_fetch_array($res))
{
		$file=$reg["foto"];
}
?>
<a href="upload/<?php echo $file;?>" target="_blank">
<?php echo $file;?>
</a>