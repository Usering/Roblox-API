<?php
	$Usernames = $_GET["Usernames"] or $_GET["usernames"];
	if (!(isset($Usernames))) {
		die("Please specify at least one userId");
	} else {
		$Usernames = explode(",",",".$Usernames);
		$UserIds = array();

		$i = 0;
		while (count($Usernames) >= $i) {
			$i++;
			if (!($Usernames[$i] == null)) {
				$UserId = json_decode(file_get_contents("http://api.robloxapi.com/Users/UserId?Username=" . $Usernames[$i]));
				array_push($UserIds, $UserId);
			}
		}
		echo json_encode(array(UserIds=>$UserIds));
	}
?>