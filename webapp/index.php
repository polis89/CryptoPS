
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

	<div class="login-form">
		<div class="name">
			Log-in to your account
		</div>
		<form action="login.php" method="post">
			<input type="text" placeholder="login" name="login">
			<input type="password" placeholder="password" name="passwd">
			<input type="submit" value="Log in" class="btn">
		</form>
	</div>



	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="js/scripts.min.js"></script>
</body>
</html>
