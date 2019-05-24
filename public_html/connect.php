<?php

	$servername = "localhost";
	$username = "id587461_preztweets";
	$password = "mischung";
	$db_name = "id587461_preztweets";
	$conn = mysqli_connect($servername, $username, $password, $db_name);
	
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysql_connect_error());
	}else{
		echo "Connected successfully";
	}
?>	