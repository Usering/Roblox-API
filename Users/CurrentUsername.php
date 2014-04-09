<?php
	$UserId = $_GET["UserId"];
	if($UserId=="" or $UserId==nil){ die(); }
	$ProfileURL = "http://www.roblox.com/user.aspx?id=" . $UserId;
	$ProfileContent = file_get_contents($ProfileURL);
	$Start = strpos($ProfileContent,'<span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL">');
	$End = strpos(substr($ProfileContent,$Start),"'s Profile</span></h2>");
	$Username = substr($ProfileContent,$Start,$End);
	$Username = substr($Username,strlen('<span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL">'));
  
	$JSON = array(
		UserId => $UserId,
		Username => $Username,
	);
	
	echo json_encode($JSON);
?>