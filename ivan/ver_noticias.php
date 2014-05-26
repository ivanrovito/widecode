<?php
//*****************************
//acá llamo a la libreria donde tengo mis funciones de conexion y de trabajo
require_once("conexion.php");
//*****************************
//llamar a los registros de la tabla noticias
$sql="select * from noticias order by id_noticia asc";
$res=mysql_db_query($bd,$sql,$con);
?>
<html>
<head>
<title>
Ver Noticias
</title>
</head>
<body>
<table align="center" width="500">
<tr>
<td width="100" align="center" valign="top" colspan="5">
<h3>Noticias de mi Web</h3>
</td>
</tr>

<tr style="background-color:#666666; color:#FFFFFF; font-weigth:bold">

<td width="150" align="center" valign="top">
Nombre
</td>
<td width="250" align="center" valign="top">
Detalle
</td>
<td width="100" align="center" valign="top">
Fecha
</td>
<td width="50" align="center" valign="top">
Hora
</td>
<td width="50" align="center" valign="top">
</td>
</tr>
<?php
while ($reg=mysql_fetch_array($res))
{
?>
<tr style="background-color:#f0f0f0">
<td width="150" align="center" valign="top">
<?=$reg["titulo"]?>
</td>
<td width="250" align="center" valign="top">
<div align="justify">
<?=$reg["detalle"]?>
</div>
</td>
<td width="100" align="center" valign="top">
<?=$reg["fecha"]?>
</td>
<td width="50" align="center" valign="top">
<?=$reg["hora"]?>
</td>
<td width="50" align="center" valign="top">
<a href="detalle.php?id_noticia=<?=$reg['id_noticia'];?>" title="Detalle de <? echo $reg['titulo'];?>">
<img src="img/lupa.png" wifth="24" height="24" border="0">
</a>
<?}?>
</td>
</tr>
</body>
</html>
