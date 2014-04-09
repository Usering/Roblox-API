<!-- 
<?php
	$UserId = $_GET["UserId"];
	if ($UserId=="" or $UserId==nil) { die(); }
	$PreviousUsernames = "";
	$Profile = "http://www.roblox.com/User.aspx?ID=".$UserId;
	$ProfileContent = file_get_contents($Profile);
	$Start = strpos($ProfileContent,"title='Previous usernames: ");
	$End = strpos(substr($ProfileContent,$Start),"'/></div>");
	if ($End == false) {} //make PreviousUserames the persons username 
	$Names = substr($ProfileContent,$Start,$End);
	$Names = substr($Names,strlen("title='Previous usernames: "));
	//echo $Names;
	$StartArr = array(
		UserId => $UserId,
	);
	
	$EndArr = array_filter(explode(", ",$Names));
	
	$JSON = array_merge($EndArr,$StartArr);
	
	echo json_encode($JSON);
?>
 -->
 
 <?php
        $UserId = $_GET["UserId"];
        if ($UserId=="" or $UserId==nil) { die(); }
        $PreviousUsernames = "";
        $Profile = "http://www.roblox.com/User.aspx?ID=".$UserId;
        $ProfileContent = file_get_contents($Profile);
        $Start = strpos($ProfileContent,"title='Previous usernames: ");
        $End = strpos(substr($ProfileContent,$Start),"'/></div>");
        if ($End == false) {} //make PreviousUserames the persons username
        $Names = substr($ProfileContent,$Start,$End);
        $Names = substr($Names,strlen("title='Previous usernames: "));
        $Usernames = array_filter(explode(", ",$Names));
        if (count($Usernames) == 0) {
        	$Username = file_get_contents("http://api.robloxapi.com/Users/cusername?UserId=" . $UserId);
        	array_push($Usernames,$Username);
        }
        //echo $Names;
       
        $JSONArr = array(
                UserId => $UserId,
                                Usernames => $Usernames
        );
       
        echo json_encode($JSONArr);
?>