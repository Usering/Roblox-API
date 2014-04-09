<?php
	$AssetId = $_GET["AssetId"];
	if($AssetId=="" or $AssetId==null){die();}
	$CheckURL = "https://api.roblox.com/marketplace/productinfo?assetId=" . $AssetId;
	$CheckContents = file_get_contents($CheckURL);
	if ($CheckContents == "") { die("Please enter a valid AssetId"); }
	$AssetURL = "http://www.roblox.com/--item?id=" . $AssetId;
	$AssetContent = file_get_contents($AssetURL);
	$Start = strpos($AssetContent,'<span class="robux-text">');
	$End = strpos(substr($AssetContent,$Start),"</span>");
	$RAP = substr($AssetContent,$Start,$End);
	$RAP = substr($RAP,strlen('<span class="robux-text">'));
	if ($RAP == null) {
		$RAP = 0;
	} else {
		$RAP = preg_replace("/[^0-9,.]/", "", $RAP);
		if ($RAP == null) {
			$RAP = 0;
		} else {
			$RAP = preg_replace(",","",$RAP);
		}
	}
	$JSON = array(
		AssetId => $AssetId,
		RAP => $RAP,
	);
	echo json_encode($JSON);
?>