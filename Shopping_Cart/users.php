<?php

function addUser($email, $password){
	global $db;
	$sql = "INSERT INTO users (user_id, email, password, created) VALUES (NULL, :email, :password, NOW())";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->execute();	
	
	
}

function grabHash($email){
	global $db;
	
	$sql = "SELECT password from users WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;
	
	
}	


?>