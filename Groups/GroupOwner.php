<?php
	$GroupId = $_GET["GroupId"];
	if($GroupId=="" or $GroupId==nil){ die(); }
	$GroupURL = "http://www.roblox.com/My/Groups.aspx?gid=" . $GroupId;
	$GroupContent = file_get_contents($GroupURL);
	$Start = strpos($GroupContent,'onclick="" >');
	$End = strpos(substr($GroupContent,$Start),"</a>");
	$Owner = substr($GroupContent,$Start,$End);
	if (strpos($GroupContent,'onclick="" >')){
		$Owner = substr($Owner,strlen('onclick="" >'));
	} else {
		$Owner = "No One!";
	}
	
	
  
	$JSON = json_encode(array(
		GroupId => $GroupId,
		Owner => $Owner,
	));
	
	echo $JSON;
?>