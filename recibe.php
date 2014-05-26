<?php
$nom=$_POST["nom"];
$pais=$_POST["pais"];
$sexo=$_POST["sexo"];

switch ($pais)
{
   case 'chile':
      $saludo="usted es de nacionalidad chilena";
   break;
   case 'colombia':
      $saludo="usted es de nacionalidad colombiana";
   break;	
   case 'argentina':
      $saludo="usted es de nacionalidad argentina";
   break;
}


if ($sexo == "f") 
{
   echo "Hola $nom, bienvenida, eres mujer, y $saludo";
}

else
{
   echo "Hola $nom, bienvenido, eres hombre, y $saludo";
}





/*
if ($sexo == "m") 
{
   echo "Hola $nom, bienvenido";
}
*/



?>
