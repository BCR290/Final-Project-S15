<?php

?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="business_logic.js"></script>
	</head>

	<body>
		<div id = "searchpage">
			<form action="logout.php" method="POST">
				<br><input type='submit' name='submit' value='Log Out' class = 'buttonInPage' />
			</form>
			<input type='submit' name='submit' value='Home Page' class = 'buttonInPage' /><br><br><br>
			
			<fieldset id='search_page'>
				<br><input type='text' name='searchBox' id='searchBox' placeholder = "Enter the key word here" />
				<input type='submit' name='searchBtn' value='SEARCH' id = 'searchBtn'/><br><br>



			</fieldset>
		</form>
	</body>
</html>