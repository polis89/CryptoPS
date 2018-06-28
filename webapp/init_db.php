 <?php
	$servername = "127.0.0.1";
	$username = "dmitrii";
	$password = "password";
	$dbname = "crypto_db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
  echo "DB Connection established <br>";

	// sql to create table
	$sql = "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(20), passwd VARCHAR(30), cookie INT)";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users created successfully "  . PHP_EOL;
	} else {
	    echo "Error creating table: " . $conn->error;
	}

	// sql to create table
	$sql = "CREATE TABLE posts (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(20), msg TEXT)";

	if ($conn->query($sql) === TRUE) {
	    echo "Table posts created successfully "  . PHP_EOL;
	} else {
	    echo "Error creating table: " . $conn->error;
	}

	$sql = "INSERT INTO users (id, name, passwd) VALUES (NULL, 'admin', 'admin123')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO users (id, name, passwd) VALUES (NULL, 'user_1', '123')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO users (id, name, passwd) VALUES (NULL, 'user_2', '123')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	$sql = "INSERT INTO `posts` (`id`,`name`,`msg`) VALUES (NULL, 'user_1', 'Hello, how are you')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO `posts` (`id`,`name`,`msg`) VALUES (NULL, 'user_2', 'Hello, i\'m sick and tired.')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO `posts` (`id`,`name`,`msg`) VALUES (NULL, 'user_1', 'Maybe a little cat can help you?<img src=\"./img/cat.jpg\">')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully "  . PHP_EOL;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?> 