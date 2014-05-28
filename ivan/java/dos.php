<html>
<head>
<title>Otro</title>
<script language="javascript" type="text/javascript">
		function saludo()
		{
				alert("hola de nuevo");	
		}
		
		var nom="hola soy tu valor";
		function hola (texto)
		{
			//alert(text);
			if (texto=="chile")
			{
					alert("usted es chileno");
			}	
			else
			{
				alert("usted no es de chile");	
			}
		}
</script>
<body>
<a href="#" onclick="saludo();">Pinchame</a>
<hr />
<input type="text" onblur="saludo();">
</input>
<hr />
<select onchange="saludo();">
<option value="pais">pais</option>
<option value="ciudad">ciudad</option>
<option value="barrio">barrio</option>
</select>
<hr />
<input type="button" value="hola" onmousemove="hola('hola soy tu texto');" />
</body>
</head>
</html>