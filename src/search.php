<?php
	include("common.php");

	$getURLS = $dbc -> prepare("SELECT url FROM URLS");
	$getURLS -> execute();
	$allTheURLS = $getURLS -> get_result();
	



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
			
			<form action="page.php">
				<input type='submit' name='submit' value='Home Page' class = 'buttonInPage' href='page.php'/><br><br><br>
			</form>

			<fieldset id='search_page'>
				<br><input type='text' name='searchBox' id='searchBox' placeholder = "Enter the key word here" />
				<input type='submit' name='searchBtn' value='SEARCH' id = 'searchBtn'/><br><br>
				<?php
				while($URL = $allTheURLS -> fetch_array(MYSQLI_ASSOC)) {
					?>
					<a href="<?php echo htmlspecialchars($URL["url"]);?>"><?php echo htmlspecialchars($URL["url"]);?></a><br>
					<?php 
				}
				?>


			</fieldset>
		</form>
	</body>
</html>