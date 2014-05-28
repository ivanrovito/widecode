<html>
<head>
<title>Validacion</title>
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<script language="javascript" type="text/javascript">
	function validar()
	{
		//alert(document.form.nom.value);
		var f=document.form;
		//****************************************
		if (f.nom.value == 0)
		{
			alert("Por favor ingrese su nombre");
			f.nom.value = "";
			f.nom.focus(); 
			return false;
		}	
		//****************************************
		if (valida_cadena(f.nom.value)==false)
		{
			alert("Por favor ingrese solo letras en el nombre");
			f.nom.value = "";
			f.nom.focus(); 
			return false;	
		}
		//****************************************
		if (f.tel.value == 0)
		{
			alert("Por favor ingrese su telefono");
			f.tel.value = "";
			f.tel.focus(); 
			return false;
		}	
		//****************************************
		if (valida_numero(f.tel.value)==false)
		{
			alert("Por favor ingrese un telefono valido");
			f.tel.value = "";
			f.tel.focus(); 
			return false;
		}		
		//****************************************
		if (f.correo.value == 0)
		{
			alert("Por favor ingrese su E-mail");
			f.correo.value = "";
			f.correo.focus(); 
			return false;
		}
		if (valida_correo(f.correo.value)==false)
		{
			alert("Por favor ingrese una direccion de correo valida");
			f.correo.value="";
			f.correo.focus();
			return;	
		}		
		//****************************************
		if (f.pais.value==0)
		{
			alert("Por favor indique su pais");
			f.pais.focus();
			return;	
		}		
		
		//alert("todo ok");
		//****************************************
		document.form.submit();
				
		//****************************************
//*********************************************************************
	
	}
	function limpiar()
	{
		document.form.reset();	
		document.form.nom.focus();
	}
</script>

</head>

<body onload="limpiar()">

<form name="form" action="procesa.php" method="post">
Nombre:<input type="text" name="nom" />
<br />
Tel&eacute;fono:<input type="text" name="tel" />
<br />
E-mail:<input type="text" name="correo" />
<br />
Pa&iacute;s:
<select name="pais">
<option value="0">Seleccione un Pa&iacute;s</option>
<option value="Argentina">Argentina</option>
<option value="Chile">Chile</option>
<option value="Uruguay">Uruguay</option>
<option value="Paraguay">Paraguay</option>
<option value="Brasil">Brasil</option>
</select>
<br>
<br>
<input type="button" value="Enviar" title="Enviar" onClick="validar()">
</form>

</body>
</html>