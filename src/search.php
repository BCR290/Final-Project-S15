<?php
	include("common.php");

	

	if(!isset($_GET["action"])) {
		$getURLS = $dbc -> prepare("SELECT url FROM URLS");
		$getURLS -> execute();
		$allTheURLS = $getURLS -> get_result();
	}
	
	if($_GET["searchBtn"] == "SEARCH") {
		$query = "%" .$_GET["searchBox"] ."%";
		$getURLS = $dbc -> prepare("SELECT CLASSES.title, CLASSES.description, URLS.url
									FROM CLASSES
									INNER JOIN CLASSES_TERM ON CLASSES.id = CLASSES_TERM.class_id
									INNER JOIN URLS ON CLASSES.url_id = URLS.id
									INNER JOIN TERMS ON CLASSES_TERM.term_id = TERMS.id
									WHERE CLASSES.title LIKE  ?
									OR CLASSES.description LIKE  ?
									OR URLS.url LIKE  ?");
		$getURLS -> bind_param("sss", $query1, $query2, $query3);
		$query1 = $query;
		$query2 = $query;
		$query3 = $query;
		$getURLS -> execute();
		$allTheURLS = $getURLS -> get_result();
	}

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
				<form method="GET">
					<br>
					<input type='text' name='searchBox' id='searchBox' placeholder = "Enter the key word here" />
					<input type='submit' name='searchBtn' value='SEARCH' id = 'searchBtn'/>
					<br><br>
				</form>
				<table>
				<?php
				$term = $_GET["term"];
				//echo $term;
				$num = 0;
				while($URL = $allTheURLS -> fetch_array(MYSQLI_ASSOC)) {
					$num++;
					?>
	
							<tr id="result_<?php echo htmlspecialchars($num); ?>">
								<td>
									<label>Title:</label><input value="<?php echo htmlspecialchars($URL['title']); ?>" type="text" id="class_input_<?php echo htmlspecialchars($num); ?>">
								</td>
								<td>
									<label>URL:</label> <a id="URL_input_<?php echo htmlspecialchars($num);?>" href="<?php echo htmlspecialchars($URL["url"]);?>"><?php echo htmlspecialchars($URL["url"]);?></a>
								</td>
								<td>
									<label>Description:</label><input value="<?php echo htmlspecialchars($URL[description]); ?>" type="text" id="desc_input_<?php echo htmlspecialchars($num); ?>">
								</td>
								
								<td>
									<select name="term_title" id="<?php echo htmlspecialchars($num); ?>">
									<?php
										$sterms = $dbc -> prepare("SELECT term_title, id FROM TERMS WHERE student_id = ? ORDER BY year DESC");
										$sterms -> bind_param("s", $sid);
										$sid = $_SESSION["user"];
										$sterms -> execute(); 
										$termsOfU = $sterms -> get_result();
										while ($aterm = $termsOfU -> fetch_array(MYSQLI_ASSOC)) {
										?>
											<option  value="<?php echo htmlspecialchars($aterm['id']); ?>"><?php echo htmlspecialchars($aterm['term_title']); ?></option>
										<?php
										}
									?>
									</select>
								</td>
								<td>
									<input type="button" value="add URL" class="<?php echo htmlspecialchars($num); ?>" onclick="addClassFromSearch(<?=$num?>)"/>
								</td>
								<td>
									<span id="it_has_been_add_<?php echo htmlspecialchars($num); ?>"></span>
								</td>

							</tr>
					<?php 
				}
				?>
				</table>


			</fieldset>
		</form>
	</body>
</html>