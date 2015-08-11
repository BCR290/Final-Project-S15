<?php
	include("common.php")

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign-In</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="business_logic.js"> </script>
		
	</head>
	

	<body id="body-color">
		<h1 id = "title">Welcome to our site!</h1>
		<div id="Sign-In">
			<fieldset>
				<form method="POST">
					<br><input type="text" name="user" size="40" id="username" placeholder="Username"><br>
					<br><input type="password" name="pass" size="40" id="password" placeholder="Password"><br><br>
					<input id="signup_button" type="submit" name="submit" value="Sign-Up!">
					<input id="login_button" type="submit" name="submit" value="Log-In">
				</form>
			</fieldset>
		</div>
	</body>
</html> 



