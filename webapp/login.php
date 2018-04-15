<?php 
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "crypto_db";

	//Connect to MySQL'
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
			echo "Connection failed: " . $conn->connect_error;
	    die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected." . PHP_EOL;

	$login = $_POST["login"];
	$passwd = $_POST["passwd"];

	// MySQL query
	// $sql = "SELECT id, name FROM users WHERE name='" .  $login . "' AND passwd='" . $passwd . "';";
	$sql = "SELECT id, name FROM users WHERE name='" . $login . "' AND passwd='" . $passwd . "'" ;
	$result = $conn->query($sql);

	// echo $_POST["login"] . PHP_EOL;
	// echo $_POST["passwd"] . PHP_EOL;

	if($result->num_rows > 0){
		echo 'ACCESS GRANTED';
	}else{
		echo 'ACCESS DENIED';
	}
	echo "<br>";

	// echo $result->num_rows . "<br>";
	// var_dump($sql);
	// echo "<br>";
	// var_dump($result);
	// mysqli_close($conn);
?>