<?php
require_once('class/class.php');

?>
<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
</head>
<body>
	<main>
		<?php include("nav.php"); ?>
		<section id="content">
		Codigo en javascript
		<pre class="brush: js">
		
		function foo()
		{
			alert("Hola mundo highlight");
		}
		
		alert("alert");
		
		</pre>
		
		Codigo en PHP
		<pre class="brush: php">
		
			echo "Hola mundito mundano Php";
				
		</pre>
		</section>
	</main>
	<?php include("footer.php"); ?>
</body>
</html>