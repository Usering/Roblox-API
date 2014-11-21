<?php
	$UserId = $_GET["UserId"];
	if($UserId=="" or $UserId==nil){ die(); }
	$ProfileURL = "http://www.roblox.com/user.aspx?id=" . $UserId;
	$ProfilePage = file_get_contents($ProfileURL);
	$Start = strpos($ProfilePage,'<span id="ctl00_cphRoblox_rbxHeaderPane_nameRegion" style="font-size:20px; font-weight:bold;">');
	$End = strpos(substr($ProfilePage,$Start),"</span>");
	$Username = substr($ProfilePage,$Start,$End);
	$Username = substr($Username,strlen('<span id="ctl00_cphRoblox_rbxHeaderPane_nameRegion" style="font-size:20px; font-weight:bold;">'));
	echo $Username;
?>