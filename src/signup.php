<?php
	include("common.php");

	if(isset($_SESSION["user"])) {
		header("Location: page.php");
	}

	// add SQL thing
	$avaliable = true;
	$usernameError = $password1Error = $password2Error = $firstnameError = $lastnameError = $passwordMissMatch = false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST["username"] == null) {
			$usernameError = true;
			//echo "1";
		} else {
			$given_username = $_POST["username"];
			foreach ($usersFound as $name) {
				if(strtolower($given_username) === strtolower($name)) {
					$avaliable = false;
				} 
			}
		}
		if ($_POST["password1"] == null) {
			$password1Error = true;
			//echo "3";
		}  
		if ($_POST["password2"] == null) {
			$password2Error = true;
			//echo "4";
		} 
		if (!$password2Error && !$password1Error) {
			if ($_POST["password2"] != $_POST["password1"]) {
				$passwordMissMatch = true ;
				//echo "5";
			}
		}
		if ($_POST["Fname"] == null) {
			$firstnameError = true;
			//echo "6";
		} 
		if ($_POST["Lname"] == null) {
			$lastnameError = true;
			//echo "7";
		} 
		if (!$usernameError && !$password1Error && !$password2 && !$firstnameError && !$lastnameError && !$passwordMissMatch && $avaliable) {
			// add them to the database and go to there page 
			//echo "we did it";
			$addUser = $dbc -> prepare("INSERT INTO USERS_2 (username, password, first_name, last_name, date_joined) VALUES(?, ?, ?, ?, now())");
			$addUser->bind_param("ssss", $username, $password, $firstname, $lastname);
			$username  = $_POST["username"];
			$password  = $_POST["password1"];
			$firstname = $_POST["Fname"];
			$lastname  = $_POST["Lname"];
			$addUser -> execute();

			$id = $dbc -> prepare("SELECT id FROM USERS_2 WHERE username = ?");
			$id -> bind_param("s", $user);
			$user = $_POST['username'];
			$id -> execute();
			$result = $id->get_result();
			$theFoundIds = $result->fetch_array(MYSQLI_ASSOC);
			$actualId = $theFoundIds["id"];

			$_SESSION["user"] = $actualId;

			header("Location: page.php");
		}

		function showError() {
			echo "<span class=\"error\"> * </span>";
		}
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
		<form action="login.php">
			<input type='submit' value='Log In' class = 'buttonInPage' href='login.php' /><br><br>
		</form>
		<form id='sign-up' method="POST">
			

			<fieldset >
				<h1 class = 'page_title' >Sign Up Right Now!!</h1>

				<label for='username' ></label>
				<input class = 'signUP' type='text' name='username'  maxlength="50" id="username_create" onkeyup="check_av(this.value)" placeholder="User Name"/>
				<span id="avaliable"></span>
				<?php
				if ($usernameError) {
					showError();
				}
				if (!$avaliable && $_SERVER["REQUEST_METHOD"] == "POST" && !$usernameError) {
					echo "<span class=\"error\">That username is not Avaliable</span>";
				}
				?>
				<br><br>
				<label for='password' ></label>
				<input class = 'signUP' type='password' name='password1' maxlength="50" placeholder="Password"/>
				<?php
				if ($password1Error) {
					showError();
				}
				?>
				<br><br>
				<label for='password' ></label>
				<input class = 'signUP' type='password' name='password2' maxlength="50" placeholder="Re-enter your Password"/>
				<?php
				if ($password2Error) {
					showError();
				}

				if ($passwordMissMatch) {
					echo "<span class=\"error\">The Passwords must match</span>" ;
				}
				?>
				<br><br>
				<label for='Fname' ></label>
				<input class ='signUP' type='text' name='Fname'  maxlength="50" id="firstname" placeholder="Your First Name"/>
				<?php
				if ($firstnameError) {
					showError();
				}
				?>
				<br><br>
				<label for='Lname' ></label>
				<input class = 'signUP' type='text' name='Lname'  maxlength="50" id="lastname" placeholder="Your Last Name" />
				<?php
				if ($lastnameError) {
					showError();
				}
				?>
				<br><br>
				<input type='submit' name='submit' value='Sign-Up' id='signup' />

			</fieldset>
		</form>
	</body>
</html>