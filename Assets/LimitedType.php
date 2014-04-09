<?php
	$limiteds = array();
	$CatalogJSONLink = "";
	$Type = $_GET["Type"];
	//Hats, Gears, Faces, All
	if ($Type==1) {
		$CatalogJSONLink = "http://www.roblox.com/catalog/json?Subcategory=9&SortType=0&SortAggregation=3&SortCurrency=0&LegendExpanded=true&Category=2&PageNumber=";
	} elseif ($Type==2) {
		$CatalogJSONLink = "http://www.roblox.com/catalog/json?Subcategory=5&SortType=0&SortAggregation=3&SortCurrency=0&LegendExpanded=true&Category=2&PageNumber=";
	} elseif ($Type==3) {
		$CatalogJSONLink = "http://www.roblox.com/catalog/json?Subcategory=10&SortType=0&SortAggregation=3&SortCurrency=0&LegendExpanded=true&Category=2&PageNumber=";
	} elseif ($Type > 3 or $Type == null or $Type == 0 or $Type < 1 or $Type == "") {
		die("Please enter a specified limited type");
	}
	for ($i; $i < 30; $i++) {
		$con = $CatalogJSONLink . $i;
		if(strlen($con) < 137 ){}  else {
			$JSONLink = file_get_contents($con);
			$page = json_decode($JSONLink);
			$limiteds = array_merge($limiteds,$page);
		}
	}
	header("Content-Type: application/json");
	echo json_encode($limiteds);
?>