<?php
require_once('class/class.php');

$title = 'Posts - WideCode Wiki';
$searchSql = "";
$orderSql = "ORDER BY pos_titulo ASC";
$orderRanking = "";
$disorderRanking = "ranking-asc";
$mostrarTodos = "";

if($_GET){
	$seccion = $_GET['t'];
	if(isset($_GET['order'])){
		if($_GET['order']=='ranking-asc'){
			$orderSql = "ORDER BY pos_ranking ASC";
			$disorderRanking = "ranking-desc";
		}else{
			$orderSql = "ORDER BY pos_ranking DESC";
			$disorderRanking = "ranking-asc";
		}
	}
}else{
	$seccion = false;
}

if($_POST){
	$searchPost = $_POST['searchPost'];
	$searchSql = "AND pos_titulo LIKE '%".$searchPost."%'";
	$mostrarTodos = '<input type="button" value="Volver" id="volver" onclick="history.back()">';
}

if($seccion){
	$sql = "SELECT * FROM posts WHERE TRUE AND pos_seccion = '".$seccion."' ".$searchSql." ".$orderSql;
	$sqlAll = "SELECT * FROM posts WHERE pos_seccion = '".$seccion."'";
}else{
	$sql = "SELECT * FROM posts WHERE TRUE ".$searchSql." ORDER BY pos_titulo ASC";
	$sqlAll = "SELECT * FROM posts";
}

$posts = new Registros();
$posts = $posts->get_reg($sql);

$allPosts = new Registros();
$allPosts = $allPosts->get_reg($sqlAll);

?>
<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
	<script>
		<?php
			for($j=0;$j<sizeof($allPosts);$j++){
				$postsTitles .= '"'.$allPosts[$j]["pos_titulo"].'",'; 
				if(($j+1)==sizeof($allPosts)){
					$postsTitles = substr($postsTitles,0,-1);
				}
			}
		?>
		postsTitles = [<?=$postsTitles?>];
		
		$(document).ready(function(){
			$('#searchPost').autocomplete({
				source: postsTitles, 
				minLength:2
			});
			
			$("#orderRanking").click(function(){
				window.location.href="posts.php?t=<?=$_GET['t']?>&order=<?=$disorderRanking?>";
			});
		})
		
		
	</script>
</head>
<body>
	<main>
		<?php include("nav.php"); ?>
		<section id="content">
			<table width="100%">
				<tr>
					<td width="40%"><h2>Posts <?=ucwords($seccion)?></h2></td>
					<td align="right" width="35%">
					<?php
						
						if($seccion){
							echo '<input type="button" value="Post" id="addPost">';
							echo '<input type="button" value="Order Ranking" id="orderRanking">';
						}
					
					?>
					</td>
					<td align="right" width="25%">
						<form action="posts.php?t=<?=$_GET['t']?>" method="POST">
							<input type="text" name="searchPost" id="searchPost" class="ui-autocomplete-input" autocomplete="off" placeholder="Search">
						</form>
					</td>
				</tr>
			</table>
			<article id="posts_list">
				<ul>
				<?php
				
				for($i=0;$i<sizeof($posts);$i++){
				?>
					<li><a href="post.php?id=<?=$posts[$i]['pos_id']?>"><?=$posts[$i]['pos_titulo']?></a></li>
				<?php
				}
				?>
				</ul>
			</article>
			
		</section>
	</main>
	<?php include("footer.php"); ?>
</body>
</html>
