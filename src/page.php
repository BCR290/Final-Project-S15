<?php
	$fName = "firstname";
	$lName = "lastname";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="business_logic.js"></script>

	</head>


	<body>
		<form id = "homepage">
			<input type='submit' name='submit' value='Log Out' id="logout" /><br>
			<input type='submit' name='submit' value='Search' id="search" /><br>
			<input type='text' name='User' id="user_home" placeholder = "Username is here" /><br>

			<fieldset id = "home_page">
				<h1 id = "homepage_title">All your Terms and Classes are here!</h1>
				<div>
					<p>class list</p><br>
				</div>
				
				<div>	
					<div id = "term_onclick"></div>
					

					<input type = "button" value='Add a Term' id="termBtn" onclick="addTerm()" />
				</div>
			</fieldset>

		</form>
		
	</body>

</html>

<script>

	//var term = document.getElementById("termBtn");
	function addTerm(){
		console.log("pop");
		var term_onclick = document.getElementById("term_onclick");
		term_onclick.innerHTML="Term name <input type='text' name='Terms' maxlength=\"50\" id=\"TermBox\" placeholder = \"Enter the Term here\" /><br><input type='button' value='Add Class' id=\"classBtn\" />";

	}



</script>
