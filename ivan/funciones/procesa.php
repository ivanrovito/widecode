<?php

/*
echo "num1=".$_GET["num1"];
echo "<br>";
echo "num2=".$_GET["num2"];
echo "<br>";
echo "op=".$_GET["op"];
*/
$num1=$_GET["num1"];
$num2=$_GET["num2"];
switch($_GET["op"])
{
		case 'suma':
			$suma=$num1+$num2;
		break;
		case 'resta':
			$suma=$num1-$num2;
		break;
}
//echo "El valor de la operacion es: $suma";
function operaciones() 
{
	
	echo "Hola soy la funcion";
	
}	

operaciones();
	
	
?>