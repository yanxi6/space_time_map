<?php

$locations = array();
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
	$line = fgets($myfile);
    list($title, $lat, $lng, $year) = explode(',', $line);
	$locations[] = array("title" => $title,
						"location" => array("lat" => floatval($lat), "lng" => floatval($lng)),
						"year" => intval($year));
}
fclose($myfile);
/*

$locations = array(
	array(
		"title" => 'Park Ave Penthouse', 
		"location" => array("lat" => 42.9409749, "lng" => -78.8755597), 
		"year" => 2013),
	array(
		"title" => 'Park Ave Penthouse', 
		"location" => array("lat" => 42.942479, "lng" => -78.872341), 
		"year" => 2013),
	array(
		"title" => 'Chelsea Loft', 
		"location" => array("lat" => 42.942730, "lng" => -78.845218), 
		"year"=> 2013),
	array(
		"title" => 'Union Square Open Floor Plan', 
		"location" => array("lat" => 42.9356509, "lng" => -78.8806361), 
		"year" => 2014),
	array(
		"title" => 'East Village Hip Studio', 
		"location" => array("lat" => 42.933920, "lng" => -78.817006), 
		"year" => 2015),
	array(
		"title" => 'TriBeCa Artsy Bachelor Pad', 
		"location" => array("lat" => 42.929660, "lng" => -78.8397251), 
		"year" => 2016),
	array(
		"title" => 'Chinatown Homey Space', 
		"location" => array("lat" => 42.910301, "lng" => -78.832859),
		"year" => 2017)
);
*/
search();
function search() {
	if(!isset($_GET["year"]) || empty($_GET["year"])) {
		echo "error";
		return;
	}
	global $locations;
	$year = $_GET["year"];
	//print_r($year);
	//print_r($locations[0]["year"]);
	$result = array();
	foreach($locations as $l) {
		if($l["year"] == $year) {
			$result[] = $l;
		}
	}
	//print_r($result);
	echo json_encode($result);
	
}
	
	
	
	
	
	