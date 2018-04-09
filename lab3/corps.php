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
	var_dump($id);
	// Get all the data out of the array to be formatted into table
	$stmt =  $db->prepare("SELECT * FROM corps WHERE id = :id");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$results = 	$stmt->fetch(PDO::FETCH_ASSOC);
	return $results;
}

function getNames(){
	// Get all the data out of the array to be formatted into table
	global $db;
	$stmt =  $db->prepare("SELECT * FROM corps ");
	$stmt->execute();
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function saveCorp($corp, $incorp_dt, $email, $zipcode, $owner, $phone){
	global $db;
	//Insert data given by user into database
	$sql = "INSERT INTO corps (corp, incorp_dt, email, zipcode, owner, phone) VALUES (:corp, :incorp_dt, :email, :zipcode,:owner, :phone)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':corp', $corp);
	$stmt->bindParam(':incorp_dt', $incorp_dt);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':zipcode', $zipcode);
	$stmt->bindParam(':owner', $owner);
	$stmt->bindParam(':phone', $phone);
	$stmt->execute();
	
}



?>