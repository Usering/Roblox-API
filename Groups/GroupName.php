<?php
	$GroupId = $_GET["GroupId"];
	if($GroupId=="" or $GroupId==nil){ die(); }
	$GroupURL = "http://www.roblox.com/groups/group.aspx?gid=" . $GroupId;
	$GroupPage = file_get_contents($GroupURL);
	$Start = strpos($GroupPage,'<h2 class="notranslate">');
	$End = strpos(substr($GroupPage,$Start),"</h2>");
	$Name = substr($GroupPage,$Start,$End);
	$Name = substr($Name,strlen('<h2 class="notranslate">'));
	$JSON = array(
		GroupId => $GroupId,
		GroupName => $Name
	);
  
  	echo json_encode($JSON);
?>