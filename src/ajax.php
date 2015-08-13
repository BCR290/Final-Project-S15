<?php
	include("common.php");

	$dbc = getdbc();
	$users = $dbc -> prepare("SELECT username FROM USERS_2 WHERE 1");
	$users->execute();
	$result = $users->get_result();
	$theFoundUsers = $result->fetch_array(MYSQLI_ASSOC);
	
	$given = $_REQUEST["user_try"];

	$avaliable = true;

	foreach ($theFoundUsers as $username => $name) {
		if(strtolower($given) === strtolower($name)) {
			$avaliable = false;
		}
	}
	if ($given != "") {
		if (!$avaliable) {
			echo "Not avaliable";
		} else {
			echo "Avaliable";
		}
	}
?>