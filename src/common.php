<?php
	function getdbc() {
		$dbhost = 'oniddb.cws.oregonstate.edu'; 
		$dbname = 'smithcr-db';
		$dbuser = 'smithcr-db';
		$dbpass = 'NSIq13ND6ShjS9UV';
		
		// $mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
  		//   	or die("Error connecting to database server");

		// mysql_select_db($dbname, $mysql_handle)
		// 	or die("Error selecting database: $dbname");

		$dbc = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("ERROR: Could not connect to the database server");
		return $dbc; 
	}

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

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		
	}
?>