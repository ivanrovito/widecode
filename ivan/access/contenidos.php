<?php
session_start();
if($_SESSION["usuario"]) 
{
?>
<html>
<head>
<title>
Contenidos
</title>
</head>

<body>
hola <?=$_SESSION["usuario"];?>
<br />
<a href="salir.php">Salir</a>
</body>
</html>
<?php
}else 
{
		echo "<script type='text/javascript'>
			alert('Usted no esta logueado');
			window.location='index.php';		
		</script>";
}
?>
		
		
		
		
		
		