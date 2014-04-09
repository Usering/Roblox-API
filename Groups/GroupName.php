<?php
	$GroupId = $_GET["GroupId"];
	if($GroupId=="" or $GroupId==nil){ die(); }
	$GroupURL = "http://www.roblox.com/My/Groups.aspx?gid=" . $GroupId;
	$GroupContent = file_get_contents($GroupURL);
	$Start = strpos($GroupContent,'<h2 class="notranslate">');
	$End = strpos(substr($GroupContent,$Start),"</h2>");
	$Name = substr($GroupContent,$Start,$End);
	$Name = substr($Name,strlen('<h2 class="notranslate">'));
	$JSON = array(
		GroupId => $GroupId,
		Name => $Name,
	);
	echo json_encode($JSON);
?>