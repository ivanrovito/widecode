<?php

$meses[0] = "enero";
$meses[1] = "febrero";
$meses[2] = "marzo";
$meses[3] = "abril";
$meses[4] = "mayo";
$meses[5] = "junio";
$meses[6] = "julio";
$meses[7] = "agosto";
$meses[8] = "septiembre";
$meses[9] = "octubre";
$meses[10] = "noviembre";
$meses[11] = "diciembre";

for ($i=0;$i<count($meses);$i++)
{
	if ($meses[$i]=="enero")
	{
	//echo "$meses[$i]";
	echo "es el primer dia del mes<br>";
	}
}

?>
