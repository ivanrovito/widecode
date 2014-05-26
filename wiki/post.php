<?php
require_once('class/class.php');

$title = 'Post - WideCode Wiki';
if($_GET){
	$pos_id = $_GET['id'];	
}

$sql = "SELECT * FROM posts WHERE pos_id = '".$pos_id."'";

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
			<?php
				$post = new Registros();
				$post = $post->get_reg($sql);
				
				$addRanking = new Registros();
				$addRanking = $addRanking -> upd_reg("UPDATE posts SET pos_ranking = pos_ranking + 1 WHERE pos_id = '".$post[0]['pos_id']."'",false,false);
				
			?>
			<table width="100%">
				<tr>
					<td>							
						<h2><?=$post[0]['pos_titulo']?></h2>
						<h3><?=ucwords($post[0]['pos_seccion'])?></h3>
					</td>
					<td align="right">
						<input type="button" class="btnGeneral" onclick="history.back()" value="Back">
					</td>
				</tr>
			</table>
			<br>
			<?=$post[0]['pos_contenido']?>
			
			<h4>Creado por: <?=$post[0]['pos_creador']?> el <?=convertDate($post[0]['pos_fecha'])?> - Editado: <?=convertDate($post[0]['pos_fechaedit'])?></h4>
		</section>
	</main>
	<?php include("footer.php"); ?>
</body>
</html>
