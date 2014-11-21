<?php
$assetId = $_GET["AssetId"];
$nameOnly = $_GET["nameOnly"];
$creatorOnly = $_GET["creatorOnly"];
if ($assetId == "" or $assetId == null){die();};
$url = "http://api.roblox.com/marketplace/productinfo?assetId=".$assetId;
$jsonData = file_get_contents($url);
if (isset($nameOnly)) {
	$asset = json_decode($jsonData,true);
	echo $asset["Name"];
} else if (isset($creatorOnly)) {
	$asset = json_decode($jsonData,true);
	echo $asset["Creator"]["Id"];
} else {
	echo $jsonData;
}

?>