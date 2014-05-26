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

?>

<select name="combo">
<option value="0">Seleccione el mes</option>

<?php
for ($z=0;$z<count($meses);$z++)
{
?>
<option value"<?php echo $meses[$z]?>" title="<?php echo $meses[$z]?>">
<?php echo $meses[$z]?>
</option>
<?php
}	
?>
</select>
