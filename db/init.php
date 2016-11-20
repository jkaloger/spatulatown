<?php
	$servername = "127.0.0.1";
	$username = "";
	$password = "";
	$db = "";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
	
	// Check connection
	if (mysqli_connect_errno()) {
	    printf("Oops... Connection Failure:\n %s\n", mysqli_connect_error());
	    exit();
	}

?>