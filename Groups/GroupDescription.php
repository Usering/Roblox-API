<?php
        $GroupId = $_GET["GroupId"];
        if($GroupId=="" or $GroupId==nil){ die(); }
        $GroupURL = "http://www.roblox.com/Groups/group.aspx?gid=" . $GroupId;
 $GroupContent = file_get_contents($GroupURL);
        $Start = strpos($GroupContent,'id="GroupDescP">');
        $End = strpos(substr($GroupContent,$Start),"</pre></div>");
        $Owner = substr($GroupContent,$Start,$End);
        $Owner = substr($Owner,strlen('id="GroupDescP">'));
        $JSON = array(
                GroupId => $GroupId,
                Description => $Owner,
        );
        echo json_encode($JSON);
?>