<?php
$wai = 'index';	//DONDE ESTOY
$title = 'Inicio - WideCode Wiki';

?>
<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
</head>
<body>
	<main>
		<? include("nav.php"); ?>
		<section id="content">
			<h2>Bienvenido a la Wiki de WideCode</h2>
			<div class="code">
				<?
					show_source("index.php");
				?>				
			</div>
		</section>
	</main>
	<?php include("footer.php"); ?>
</body>
</html>