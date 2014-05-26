<html>
<head>
<title>..:: Trabajo con PHP y MySQL ::..</title>
</head>

<body>
<form name="form" method="post" action="recibe.php">
Nombre: <input type="text" name="nom" />
<br />
Ingrese Pais:<select name="pais">
<option value="chile">Chile</option>
<option value="colombia">Colombia</option>
<option value="argentina">Argentina</option>
</select>
<br />
Indique sexo
M<input type="radio" name="sexo" value="m">
F<input type="radio" name="sexo" value="f">
<hr>
<input type="submit" value="Enviar" title="Enviar">
</form>
</body>
</html>
