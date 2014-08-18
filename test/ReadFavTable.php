<?php
	include '../conn.php';
	$query = 'SELECT user_id, fav_name, fav_desc FROM fav;';
	$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
	if($result)
	{
		echo($mysqli->error);
	}
	else 
	{
		echo($mysqli->error);
	}
	
	while(list($User_id, $name, $url) = $result->fetch_row())
	{
		printf("%s - %s - %s <br />",$User_id, $name, $url);
	}