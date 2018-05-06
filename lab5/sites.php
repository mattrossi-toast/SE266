<?php

function addUrl($searchFor, $urls){
	global $db;	
	//Insert data given by user into database
	$sql = "INSERT INTO sites (site, date) VALUES (:site, NOW())";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':site', $searchFor);
	$stmt->execute();
	$last_id = $db->lastInsertId();
	
	return $last_id;
}	


function searchFor($searchBy){
	$file =  file_get_contents($searchBy);
	//Grab urls from page using regex
preg_match_all("(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)", $file, $matches, PREG_OFFSET_CAPTURE);
return $matches;
	
	
	
}
function pullSitesForDropDown(){ 
global $db; 
//Grab data from sites table to populate dropdown
$sql = "SELECT * FROM sites";
$stmt = $db->prepare($sql);
$stmt->execute();
$sites = $stmt->fetchAll();

return $sites;
}

function isUnique($site){

	global $db;	
	$sql = "SELECT * FROM sites WHERE site = :site";
	$stmt = $db ->prepare($sql);
	$stmt->bindParam(':site', $site);
	$stmt->execute();
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
	
}

	function grabDate($site_id){
	global $db;	
	$sql =  "SELECT date FROM sites WHERE site_id = :site_id"; //pull all the links that have site_id that matches
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':site_id', $site_id);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;		
	}




?>