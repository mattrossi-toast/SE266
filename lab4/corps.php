<?php
function getRows(){
	// Get all the data out of the array to be formatted into table
	global $db;
	$stmt =  $db->prepare("SELECT * FROM corps ");
	$stmt->execute();
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function getRowById($db, $id){
	// Get all the data out of the array to be formatted into table
	$stmt =  $db->prepare("SELECT * FROM corps WHERE id = '$id' LIMIT 1");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$results = 	$stmt->fetch(PDO::FETCH_ASSOC);
	return $results;
}

function getNames(){
	// Get all the data out of the array to be formatted into table
	global $db;
	$stmt =  $db->prepare("SELECT id, corp FROM corps  ");
	$stmt->execute();
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function deleteRows($id){
	//deletes data with given id
	global $db;
	$stmt =  $db->prepare("DELETE FROM corps WHERE id = '$id' LIMIT 1 ");
	$stmt->execute();	
}

function saveCorp($corp, $email, $zipcode, $owner, $phone){
	global $db;
	//Insert data given by user into database
	$sql = "INSERT INTO corps (corp, incorp_dt, email, zipcode, owner, phone) VALUES (:corp, NOW(), :email, :zipcode,:owner, :phone)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':corp', $corp);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':zipcode', $zipcode);
	$stmt->bindParam(':owner', $owner);
	$stmt->bindParam(':phone', $phone);
	$stmt->execute();
	if($sql){
		
		echo("New Corporation Successfully Added");
	}
	
	else{
		echo("Sorry, we had a problem connecting to the database");
	}
}

function updateCorp($id, $corp, $incorp_dt, $email, $zipcode, $owner, $phone){
	global $db;
	var_dump($id);
	//Insert data given by user into database
	$sql = "UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = '$id' LIMIT 1";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':corp', $corp);
	$stmt->bindParam(':incorp_dt', $incorp_dt);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':zipcode', $zipcode);
	$stmt->bindParam(':owner', $owner);
	$stmt->bindParam(':phone', $phone);
	$stmt->execute();	
}

function sortRows($sortBy, $ascDesc){
	global $db;

	//Grab data from database sorted
	$sql = "SELECT id, corp FROM corps ORDER BY $sortBy $ascDesc;";

	$stmt = $db->prepare($sql);
	$stmt->execute();	
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
	
	
}

function searchRows($searchBy){
	global $db;
	//Grab data that contains search criteria
	$sql = "SELECT id, corp FROM corps WHERE corp LIKE '%$searchBy%'";
	$stmt = $db->prepare($sql);
	$stmt->execute();	
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
	
	
}


?>