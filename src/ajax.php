<?php
	include("common.php");
	
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