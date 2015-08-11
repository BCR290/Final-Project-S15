<?php
	include("common.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		//print_r($_POST);
		if($_POST['submit'] == 'Log-In') {
			$dbc = getdbc();
			//
			//echo '1' . $_POST['user'] . ' ';
			//echo '2' . $_POST['pass'] . ' ';

			$id = $dbc -> prepare("SELECT id FROM USERS_2 WHERE username = ?");
			$id -> bind_param("s", $user);
			$user = $_POST['user'];
			$id -> execute();
			$result = $id->get_result();
			$theFoundIds = $result->fetch_array(MYSQLI_ASSOC);
			$actualId = $theFoundIds["id"];
			//echo 'id ' . $actualId. ' ';


			$pword = $dbc -> prepare("SELECT password FROM USERS_2 WHERE id = ?");
			$pword -> bind_param("i", $id);
			$id = $actualId;
			$pword -> execute();
			$result = $pword->get_result();
			$theFoundPWords = $result->fetch_array(MYSQLI_ASSOC);
			$actualPWord = $theFoundPWords["password"];
			if($actualPWord == $_POST['pass']) {
				header('Location: page.php');
				echo 'login success';
				echo '3 ' . $actualPWord;
			} else {
				$msg = 'Invalid Username and password combination';
				echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
			}
		}
	} 

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Log in</title>
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



