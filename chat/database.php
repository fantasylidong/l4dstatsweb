<?php
	// DB hostname
	$servername = "10.0.0.4";

	// DB username
	$username = "morzlee";

	// DB password
	$password = "anne123";

	// DB name
	$dbname = "chat";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	mysqli_set_charset($conn, "utf8");
?>
