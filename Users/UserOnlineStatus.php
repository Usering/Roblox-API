<?php
$UserId = $_GET["UserId"];
if($UserId=="" or $UserId==nil){ die(); }
$ProfileContent = file_get_contents("http://www.roblox.com/User.aspx?ID=".$UserId);
$Online = strpos($ProfileContent,"[ Online:");

//$Status = ""
if ($Online == true) {
	$Status = "Online";
	//echo "online";
} else {
	$Status = "Offline";
	//echo "offline";
}

$JSON = array(
	UserId => $UserId,
	Status => $Status,
);

echo json_encode($JSON);
?>