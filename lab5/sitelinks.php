<?php 
// Model for sitelinks table
function addSiteLinks($last_id, $urls){
	global $db;
	$count = 0;
	
	foreach($urls as $url){
		foreach($url as $link){
			
			$linkArray[$count] = $link[0]; //Store index 0 of each nested array into a new array
			$count += 1;
		}
				
	}
	$linkArray = array_unique($linkArray); //remove duplicates
	for($count = 0; $count < count($linkArray); $count++){
	$sql = "INSERT INTO sitelinks (site_id, link) VALUES ($last_id, :link)";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':link', $linkArray[$count]);
				$stmt->execute();				
	}
	
	return $linkArray;
}
	
	function grabURL($site){
	global $db;	
	$sql =  "SELECT link FROM sitelinks WHERE site_id = :site"; //pull all the links that have site_id that matches
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':site', $site);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
	
}


	?>