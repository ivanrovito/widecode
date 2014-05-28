<html>
<head>
<title>Magia</title>
<!--<script language="javascript" type="text/javascript" src="js/funciones.js"></script>-->
<script language ="javascript" type="text/javascript">
	function capa(texto)
		{
			document.getElementById("muestra").innerHTML=texto;
			
			//alert(document.getElementById("campo").value);	
		}
</script>
</head>
<body>
<input type="text" id="campo" onblur="capa(document.getElementById('campo').value)" />
<br />
<div id="muestra">hola soy el primer texto</div>
</body>
</html>