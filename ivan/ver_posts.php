<?php
require_once("conexion.php");
$sql="SELECT * FROM  `posts`";
$res=mysql_db_query($bd,$sql,$con);
 

?>

<html>
<head>
<title>Ver Posts</title>
<script language="javascript" type="text/javascript">
	function cambiar(id,color)
	{
		document.getElementById(id).style.backgroundColor=color;
	}
</script>
</head>

<body>
<table align="center" width="600">
<tr>
<td align="center" width="600" valign="top" colspan="4">
<h3>Posts de la Wiki</h3>
</td>
</tr>
<tr style="background-color:#666666; color:##FFFFFFF; font-weight:bold">

<td width="200" align="center" valign="top">
Titulo
</td>
<td width="200" align="center" valign="top">
Contenido
</td>
<td width="200" align="center" valign="top">
Creador
</td>
<td width="200" align="center" valign="top">
Fecha
</td>
</tr>
<?php
$i=0;
while ($reg=mysql_fetch_array($res))
{
$i++;
//$i=$i+1;
?>
<tr id="<?php echo "id_$i";?>" style="background-color:#f0f0f0" onmousemove="cambiar('<?php echo "id_$i";?>','#cccccc')" onmouseout="cambiar('<?php echo "id_$i";?>','#f0f0f0')">
<td width="300" align="center" valign"top">
<?php echo $reg["pos_titulo"];?>
</td>
<td width="300" align="center" valign"top">
<?php echo $reg["pos_contenido"];?>
</td>
<td width="300" align="center" valign"top">
<?php echo $reg["pos_creador"];?>
</td>
<td width="300" align="center" valign"top">
<?php echo $reg["pos_fecha"];?>
</td>
</tr>
<?php
}
?>
</table>

</body>
</html>
