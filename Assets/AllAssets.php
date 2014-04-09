<?php
	$limiteds = array();
	$CatalogJSONLink = "http://www.roblox.com/catalog/json?SortType=0&SortAggregation=3&SortCurrency=0&LegendExpanded=true&Category=0&PageNumber=";
	for ($i = 1; $i < 94; $i++) {

		$con = $CatalogJSONLink . $i;
		
		if(strlen($con) > 130 ){}  else {
			$JSONLink = file_get_contents($con);
		//	echo $JSONLink;
			$page = json_decode($JSONLink);
			array_push($limiteds,$page);
		}
	}
	
	//$FinalJSON = $JSON . "]";
	header("Content-Type: application/json");
	echo json_encode($limiteds);
?>