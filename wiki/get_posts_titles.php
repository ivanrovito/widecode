<?php
	$mysqli = new MySQLi("localhost","b6000531_wiki","WideCode14","b6000531_wiki");
	/* Connect to database and set charset to UTF-8 */
	if($mysqli->connect_error) {
		echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
		exit;
	} else {
		$mysqli->set_charset('utf8');
	}
	/* retrieve the search term that autocomplete sends */
	$search = trim(strip_tags($_GET['search'])); 
	$a_json = array();
	$a_json_row = array();
	if ($data = $mysqli->query("SELECT pos_titulo FROM posts WHERE pos_titulo LIKE '%$search%' ORDER BY pos_titulo")) {
		while($row = mysqli_fetch_array($data)) {
			$pos_titulo = htmlentities(stripslashes($row['pos_titulo ']));
			$a_json_row["pos_titulo"] = $pos_titulo;
			array_push($a_json, $a_json_row);
		}
	}
	// jQuery wants JSON data
	echo json_encode($a_json);
	flush();

	$mysqli->close();
?>