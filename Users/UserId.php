<?php
	$Username = $_GET["Username"];
	if($Username=="" or $Username==nil){ die(); }
	$ProfileURL = "http://www.roblox.com/user.aspx?username=" . strtolower($Username);
	$ProfilePage = file_get_contents($ProfileURL);
	$Start = strpos($ProfilePage,'<a data-js-my-button style="float: right" href="Friends.aspx?UserID=');
	$End = strpos(substr($ProfilePage,$Start),'" class="btn-small btn-neutral" id="HeaderButton">');
	$UserId = substr($ProfilePage,$Start,$End);
	$UserId = substr($UserId,strlen('<a data-js-my-button style="float: right" href="Friends.aspx?UserID='));
	if ($UserId == null) {
		die("Please enter a valid username");
	}
	$JSON = array(
		Username => $Username,
		UserId => $UserId
	);
  
  	echo json_encode($JSON);
?>