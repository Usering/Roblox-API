<?php
	$limiteds = array();
	$CatalogJSONLink = "http://www.roblox.com/catalog/json?Subcategory=2&SortType=0&SortAggregation=3&SortCurrency=0&LegendExpanded=true&Category=2&PageNumber=";
	for ($i; $i < 30; $i++) {

		$con = $CatalogJSONLink . $i;
		if(strlen($con) < 136 ){}  else {
			$JSONLink = file_get_contents($con);
			$page = json_decode($JSONLink);
			$limiteds = array_merge($limiteds,$page);
		}
	}
	
	//$FinalJSON = $JSON . "]";
	header("Content-Type: application/json");
	echo json_encode($limiteds);
?>