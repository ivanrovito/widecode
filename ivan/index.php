<?php
require_once("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sitio Dinámico</title>
<style type="text/css">
	body{ margin-top:0px; top:0px;}
	#principal { width:600px; height:500; border:solid}
	#header{ width:600px; height:100px; float:left}
	#main{ width:600px; height:400px; float:left}
	#menu{ width:100px; height:400px; float:left}
	.boton{ width:100px; height:25px; float:left; background-color:#666666; color:#FFFFFF}
	.url{ color: #FFFFFF; text-decoration: none}
	#contenido{ width:500px; height:400px; float:left}
</style>
</head>

<body>
<div id="principal">
<div id="header">
<img src="img/header2.jpg" width="600" align="100">
</div>
<div id="main">
<!--*************************************************-->
<div id="menu">
<?php
$sql="select * from menu";
$res=mysql_db_query($bd,$sql,$con);
while($reg=mysql_fetch_array($res))
{
	?>
	<div class="boton" align="center">
	<a href="index.php?id=<?=$reg["id_menu"];?>" class="url">
	<?=$reg["texto"];?>
	</a>
	</div>
	<?php
}
?>

<!--*************************************************-->
<div id="contenido" align="center">
contenido
</div>
</body>
</html>
