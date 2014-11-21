<?php
	$GroupId = $_GET["GroupId"];
	if($GroupId=="" or $GroupId==nil){ die(); }
	$GroupURL = "http://www.roblox.com/groups/group.aspx?gid=" . $GroupId;
	$GroupPage = file_get_contents($GroupURL);
	$Start = strpos($GroupPage,'onclick="" >');
	$End = strpos(substr($GroupPage,$Start),"</a>");
	$Owner = substr($GroupPage,$Start,$End);
	$Owner = substr($Owner,strlen('onclick="" >'));
	$JSON = array(
		GroupId => $GroupId,
		GroupOwner => $Owner
	);
  
  	echo json_encode($JSON);
?>