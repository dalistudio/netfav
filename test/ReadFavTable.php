<?php
	include '../conn.php';
	$query = 'SELECT User_id, name, url FROM fav;';
	$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
	while(list($User_id, $name, $url) = $result->fetch_row())
	{
		printf("%s - %s - %s <br />",$User_id, $name, $url);
	}