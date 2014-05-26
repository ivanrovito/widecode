<?php
require_once("conexion.php");
$id_noticia=$_GET["id_noticia"];
$sql="select * from noticias where id_noticia=$id_noticia";
//echo $sql;
$res=mysql_db_query($bd,$sql,$con);
?>
<?php
if ($reg=mysql_fetch_array($res))
{
?>
<html>
<head>
<title><?=$reg["titulo"];?></title>
</head>
<body>

<table width="500" align="center">
<tr>
<td valign="top" align="center" width="500">
<h3><?php echo $reg["titulo"];?></h3>
</td>
</tr>
<tr>
<td valign="top" align="center" width="500">
<div align="justify">
<?=$reg["detalle"]?>
</div>
</td>
</tr>
<tr>
<td width="500" align="center" valign="top">
<hr />
<form name="form" action="comentarios.php" method="post">
Nombre:<input type="text" />
<br />
 E-mail:<input type="text" />
<br />
Mensaje:<textarea name="mensaje" cols="40" rows="10"></textarea>
<br />
<input type="hidden" name="id_noticia" value="<?=$_GET["id_noticia"]?>" />
<input type="submit" value="Enviar" title="Enviar" />
</form>
</td>
</tr>
<tr>
<td>
<?php 
$consulta="select * from comentarios where id_noticia=".$_GET["id_noticia"]." ";
$result=mysql_db_query($bd, $consulta, $con);
?>
<ul>
<?php
while($rows=mysql_fetch_array($result))
{
?>
<li>
<strong>Nombre</strong><?=$rows["nombre"];?>
<br />
<b>Mensaje</b>: <?=$rows["mensaje"];?></h>
<hr />
</li>
<?php
}
?>
</ul>
</td>
</tr>
</table>
<?php
}
?>
</body>
</html>
