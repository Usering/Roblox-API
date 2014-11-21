<?php
	$UserIds = $_GET["UserIds"] or $_GET["userIds"];
	if (!(isset($UserIds))) {
		die("Please specify at least one userId");
	} else {
		$UserIds = explode(",",",".$UserIds);
		$Usernames = array();

		$i = 0;
		while (count($UserIds) >= $i) {
			$i++;
			if (!($UserIds[$i] == null)) {
				$Username = file_get_contents("http://api.robloxapi.com/Users/RawUsername?UserId=" . $UserIds[$i]);
				array_push($Usernames, $Username);
			}
		}
		echo json_encode($Usernames);
	}
?>