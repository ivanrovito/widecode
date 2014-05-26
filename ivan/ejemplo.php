<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::  Ejemplo de trabajo con variables ::..</title>
</head>

<body>

<form action="respuesta.php" method="get">
Ingrese su nombre:<input type="text" name="nom" />
<br />
Ingrese su apellido:<input type="text" name="ap" />
<br />
Seleccione pais
<select name="pais">
	<option value="argentina">Argentina</option>
	<option value="chile">Chile</option>
	<option value="uruguay">Uruguay</option>
	<option value="españa">España</option>
</select>
<hr />
<input type="submit" value="Enviar" title="Enviar" />
<hr />
</form>
<br><?=hola?>
</body>
</html>
