<?php
	$GroupId = $_GET["GroupId"];
	if($GroupId=="" or $GroupId==nil){ die(); }
	$GroupURL = "http://www.roblox.com/groups/group.aspx?gid=" . $GroupId;
	$GroupPage = file_get_contents($GroupURL);
	$Start = strpos($GroupPage,'<pre class="notranslate">');
	$End = strpos(substr($GroupPage,$Start),"</pre>");
	$Description = substr($GroupPage,$Start,$End);
	$Description = substr($Description,strlen('<pre class="notranslate">'));
	$JSON = array(
		GroupId => $GroupId,
		GroupDescription => $Description
	);
  
  	echo json_encode($JSON);
?>