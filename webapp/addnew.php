<?php

	$servername = "127.0.0.1";
	$username = "dmitrii";
	$password = "password";
	$dbname = "crypto_db";
	//Connect to MySQL'
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
			echo "Connection failed: " . $conn->connect_error;
	    die("Connection failed: " . $conn->connect_error);
	} 

	$name = $_POST["name"];
	$msg = $_POST["text"];
	$sql = "INSERT INTO posts (id, name, msg) VALUES (NULL, '".$name."', '".$msg."')";
	// echo $sql;
	$result = $conn->query($sql);
	header('Location: login.php'); 

?>