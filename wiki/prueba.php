<?php

$con=mysql_connect("localhost","b6000531_wiki","WideCode14");
$bd="b6000531_wiki";
$seccion = $_GET['t'];

$sql="select * from posts where pos_seccion = '$seccion'";
$res=mysql_db_query($bd,$sql,$con);

?>

<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
</head>
<body>
<body>
	<main>
	<? include("nav.php"); ?>
		<section id="content" valign="top">
			<title>
				Ver Posts
			</title>
	
			<table align="center" width="500" valign="top">
			<tr>
			<td width="100" align="center" valign="top" colspan="7">
			<h3>Widecode Posts</h3>
			</td>
			</tr>

			<tr style="background-color:#666666; color:#FFFFFF; font-weigth:bold">

			<td width="150" align="center" valign="top">
				Titulo
			</td>
			<td width="250" align="center" valign="top">
				Seccion
			</td>
			<td width="100" align="center" valign="top">
				Subseccion
			</td>
			<td width="200" align="center" valign="top">
				Contenido
			</td>
			<td width="150" align="center" valign="top">
				Creador
			</td>
			<td width="150" align="center" valign="top">
				Fecha
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
			<?=$reg["pos_titulo"]?>
		</td>
		<td width="250" align="center" valign="top">
		<div align="center">
			<?=$reg["pos_seccion"]?>
		</div>
		</td>
		<td width="100" align="center" valign="top">
			<?=$reg["pos_subseccion"]?>
		</td>
		<td width="300" align="justify" valign="top">
			<?=$reg["pos_contenido"]?>
		</td>
		<td width="150" align="center" valign="top">
			<?=$reg["pos_creador"]?>
		</td>
		<td width="50" align="center" valign="top">
			<?=$reg["pos_fecha"]?>
		</td>
		<td width="50" align="center" valign="top">
		<a href="detalle.php?id_noticia=<?=$reg["pos_id"];?>" title="Detalle de <? echo $reg["pos_titulo"];?>">
		<img src="../ivan/img/lupa.png" width="24" heigth="24" border="0">
		</a>
		</td>
		</tr>
	<?php
	}
	?>
</table>
</main>
	<?php include("footer.php"); ?>
</body>
</html>
