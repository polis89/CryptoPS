
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Site name</title>

	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>

	<link rel="stylesheet" href="css/main.min.css">

</head>
<body>

<?php 
	$servername = "127.0.0.1";
	$username = "root";
	$password = "CVB9zx";
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
	$is_new_session = true;
	// MySQL query
	// $sql = "SELECT id, name FROM users WHERE name='" .  $login . "' AND passwd='" . $passwd . "';";
	$sql = "SELECT id, name FROM users WHERE name='" . $login . "' AND passwd='" . $passwd . "'" ;

	// echo $_POST["login"] . PHP_EOL;
	// echo $_POST["passwd"] . PHP_EOL;
 	if(!isset($_COOKIE["user_secret_key"])) {
    // echo "Cookie is not set!";
	}else{
    // echo "Value is: " . $_COOKIE["user_secret_key"] . PHP_EOL;
    $sql = "SELECT id, name FROM users WHERE cookie=" .$_COOKIE["user_secret_key"];
    $is_new_session = false;
	}

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$user_name = $row["name"];
		$user_id = $row["id"];
		if($is_new_session){
			$user_secret_key = rand();
			$sql = "UPDATE users SET cookie=".$user_secret_key." WHERE id=".$user_id;
			$conn->query($sql);
			setcookie("user_secret_key", $user_secret_key, time()+36000);
			header('Location: ./login.php');
		}
		?>



	<div class="data-block">

		<div class="granted">Access Granted</div>
		<div class="name">Logged in as <?php echo $user_name; ?></div>
		<a href="#" class="btn logout">LOG OUT</a>
	</div>



	<div class="chat">
		<?php 
		$sql = "SELECT * FROM posts " ;
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
	    echo '<div class="chat-row">';
	    echo '<div class="name">' . $row["name"] . "</div>";
	    echo '<div class="msg">' . $row["msg"] . "</div>";
	    echo '</div>';
	  }
		?>
	</div>
	

	<div class="enter_new">
		<form action="addnew.php" method="post">
			<div class="name">Enter new message</div>
			<input type="hidden" name="name" value="<?php echo $user_name;?>">
			<textarea name="text" id="text" cols="30" rows="10"></textarea>
			<br>
			<input type="submit" value="Submit" class="btn">
		</form>
	</div>

		<?php
	}else{
		?>


	<div class="login-form">
		<form action="login.php" method="post">
			<input type="text" placeholder="login" name="login" <?php
				if(isset($_POST["login"])){
			?>class="error"<?php		
				} 
			?>>
			<input type="password" placeholder="password" name="passwd" <?php
				if(isset($_POST["login"])){
			?>class="error"<?php		
				} 
			?>>
			<input type="submit" value="Log in" class="btn">
			<?php
				if(isset($_POST["login"])){
			?>
				<img src="./img/AccessDenied.jpg" alt="AD">
			<?php		
				} 
			?>

		</form>
	</div>

		<?php
	}
	echo "<br>";

	// echo $result->num_rows . "<br>";
	// var_dump($sql);
	// echo "<br>";
	// var_dump($result);
	// mysqli_close($conn);
?>




	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="js/scripts.min.js"></script>
</body>
</html>