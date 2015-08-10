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
		<div id="Sign-In">
			<fieldset style="width:30%"><legend>LOG-IN HERE</legend>
				<form method="POST">
					User <br><input type="text" name="user" size="40" id="username"><br>
					Password <br><input type="password" name="pass" size="40" id="password"><br>
					<input id="login_button" type="submit" name="submit" value="Log-In">
				</form>
			</fieldset>
		</div>
	</body>
</html> 



