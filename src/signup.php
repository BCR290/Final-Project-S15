<?php
	include("common.php");

	// add SQL thing
	$given_username = $_POST["username"];

	$avaliable = false;

	foreach ($theFoundUsers as $username => $name) {
		if(strtolower($given_username) === strtolower($name)) {
			$avaliable = true;
		}
	}

	if ($avaliable) {
		if ($_POST['password'] == null) {

		} else if 

	} 

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
			<fieldset id='brad' >
				<legend>Sign-Up</legend>


				<label for='username' ></label>
				<input type='text' name='username' id='uname' maxlength="50" id="username_create" onkeyup="check_av(this.value)" placeholder="User Name"/>
				<span id="error"></span><br>


				<label for='password' ></label>
				<input type='password' name='password' id='pword' maxlength="50" placeholder="Password"/><br>


				<label for='password' ></label>
				<input type='password' name='password' id='Re-password' maxlength="50" placeholder="Re-enter your Password"/><br>

				
				<label for='Fname' ></label>
				<input type='text' name='Fname' id='Fname' maxlength="50" id="firstname" placeholder="Your First Name"/><br>
				

				<label for='Lname' ></label>
				<input type='text' name='Lname' id='Lname' maxlength="50" id="lastname" placeholder="Your Last Name" /><br><br>

				<input type='submit' name='submit' value='Sign-Up' id='signup' />

			 
			</fieldset>
		</form>
	</body>
</html>