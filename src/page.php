<?php
	include("common.php");

	$fName = "firstname";
	$lName = "lastname";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="frontend_logic.js"></script>
		<script src="business_logic.js"></script>

	</head>


	<body>
		

		<div id = "homepage">	
			<form action="logout.php" method="POST">
				<input type='submit' name='submit' value='Log Out' id="logout" /><br>
			</form>

			<input type='submit' name='submit' value='Search' id="search" /><br>
			<input type='text' name='User' id="user_home" placeholder = "Username is here" /><br>

			<fieldset id = "home_page">
				<h1 id = "homepage_title">All your Terms and Classes are here!</h1>
				<div>
					<p>class list</p><br>
				</div>
				
				<div id="main">	


					<div id="the_place_for_terms">
						
					</div>

					<div id = "add_term" style="display: none">
						<form>
							<label>Term Title</label>
							<input name="term_title_input" id="term_title_input" type="text">
							<span class="error" id="notitle"></span>
							<br>
							<label>Term Quarter</label>
							<select id="quarter_input" name="quarter_input">
								<option></option>
								<option value="fall">Fall</option>
								<option value="winter">Winter</option>
								<option value="spring">Spring</option>
								<option value="summer">Summer</option>
							</select>
							<br>
							<label>Term year</label>
							<select id="year_input" name="year_input">
								<option></option>
								<?php
								for($i=1990; $i <= 2050; $i++) {
									echo "<option value=\"$i\">$i</option>";
								}
								?>
							</select>
							<br>
							<input type = "button" value='submit term' id="termBtn" onclick="submitTerm()" />
							<input type = "button" value='canecl' id="cancel_termBtn" onclick="cancelTerm()" />
						</form>
					</div>
					
					<button id="addtermBtn" onclick="addTerm()" style="display: block"> Add a Term </button>
				</div>
			</fieldset>

		</div>
	</body>

</html>

