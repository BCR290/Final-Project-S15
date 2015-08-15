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
				<table>
				<?php
				$term = $_GET["term"];
				//echo $term;
				while($URL = $allTheURLS -> fetch_array(MYSQLI_ASSOC)) {
					?>
					<div class="result">
	
							<tr>
								<td>
									<label>Title:</label><input type="text" id="class_input_<?php echo htmlspecialchars($term); ?>">
								</td>
								<td>
									<label>URL:</label> <a id="URL_input_<?php echo htmlspecialchars($term);?>" href="<?php echo htmlspecialchars($URL["url"]);?>"><?php echo htmlspecialchars($URL["url"]);?></a>
								</td>
								<td>
									<label>Description:</label><input type="text" id="desc_input_<?php echo htmlspecialchars($term); ?>">
								</td>
								<td>
									<input type="button" value="add URL" class="<?php echo htmlspecialchars($term); ?>" onclick="addClass(<?=$term?>)"/>
								</td>
							</tr>
					<div> 
					<?php 
				}
				?>
				</table>


			</fieldset>
		</form>
	</body>
</html>