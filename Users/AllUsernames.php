<?php
	$UserId = $_GET["UserId"];
	if($UserId=="" or $UserId==nil){ die(); }
	$ProfileURL = "http://www.roblox.com/user.aspx?id=" . $UserId;
	$ProfilePage = file_get_contents($ProfileURL);
	$Start = strpos($ProfilePage,"<img class='tooltip-bottom' style='cursor:pointer;' src='http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png' title='Previous usernames: ");
	$End = strpos(substr($ProfilePage,$Start),"'/></div>");
	$Usernames = substr($ProfilePage,$Start,$End);
	$Usernames = substr($Usernames,strlen("<img class='tooltip-bottom' style='cursor:pointer;' src='http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png' title='Previous usernames: "));

	$table = array(
		UserId => $UserId,
		Usernames => explode(", ",$Usernames)
	);

	echo json_encode($table);
?>