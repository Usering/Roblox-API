<?php
	$Username = $_GET["username"];
	$ProfileURL = "http://www.roblox.com/user.aspx?username=" . $Username;
	$ProfileContent = file_get_contents($ProfileURL);
	$Start = strpos($ProfileContent,'<form name="aspnetForm" method="post" action="/user.aspx?id=');
	$End = strpos(substr($ProfileContent,$Start),'" id="aspnetForm">');
	$UserId = substr($ProfileContent,$Start,$End);
	$UserId = substr($Username,strlen('<form name="aspnetForm" method="post" action="/user.aspx?id='));
  
	$JSON = array(
		UserId => $UserId,
		Username => $Username,
	);
	
	echo json_encode($JSON);
?>