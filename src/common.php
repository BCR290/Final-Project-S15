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

	// gets the users
	$dbc = getdbc();
	$users = $dbc -> prepare("SELECT username FROM USERS_2 WHERE 1");
	$users->execute();
	$result = $users->get_result();
	$theFoundUsers = $result->fetch_array(MYSQLI_ASSOC);

?>