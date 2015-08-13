<?php
	include("common.php");

	// add SQL thing

	

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="business_logic.js"></script>
	</head>

	<body>
		<form id='sign-up'>
			<fieldset >
				<legend>Sign-Up</legend>

				<label for='username' >UserName*:</label>
				<input type='text' name='username' id='username' maxlength="50" id="username_create" onkeyup="check_av(this.value)"/>
				<span id="error"></span><br>

				<label for='password' >Password*:</label>
				<input type='password' name='password' id='password' maxlength="50" id="p1" /><br>

				<label for='password' >Re-enter your Password*:</label>
				<input type='password' name='password' id='Re-password' maxlength="50" id="p2" /><br>

				
				<label for='Fname' >Your First Name*: </label>
				<input type='text' name='Fname' id='Fname' maxlength="50" id="firstname" /><br>
				

				<label for='Lname' >Your Last Name*: </label>
				<input type='text' name='Lname' id='Lname' maxlength="50" id="lastname" /><br>
				 

				 


				<input type='submit' name='submit' value='Sign-Up' id="signup" />
			 
			</fieldset>
		</form>
	</body>
</html>