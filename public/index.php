<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style/index.css">
		<?php 
			session_start();
			if (isset($_SESSION['login_err'])) {
				echo $_SESSION['login_err'];
			}
			session_destroy();
		?>
	</head>
	<body>
		<img id="rubber-ducky" src="./resources/rub-duck.png">
		<h1>Private Drive</h1>
		<p>Version 0.0.1</p>
		<form action="user.auth.php" method="post">
			<input name="user" type="text" placeholder="User"><br>
			<input name="password" type="password" placeholder="Password"><br><br>
			<input name="submit" type="submit" value="Login">
		</form>
	</body>
</html>
