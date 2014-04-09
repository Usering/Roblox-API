<?php
	$AssetId = $_GET["AssetId"];
	$UserId = $_GET["UserId"];
	if ($AssetId == "" or $AssetId == null) { die("Please enter a valid AssetId"); }
	if ($UserId == "" or $UserId == null) { die("Please enter a valid UserId"); }
	$has = file_get_contents("http://api.roblox.com/ownership/hasasset?userId=" . $UserId ."&assetId=" . $AssetId);
	if ($has == "true") {
		echo "true";
	} else {
		echo "false";
	}
?>