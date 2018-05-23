<?php
// Model File for Customers Table
function addCustomer($email, $password){
	global $db;
	$sql = "INSERT INTO customers (customer_id, email, password, created) VALUES (NULL, :email, :password, NOW())";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->execute();	
	
	
}

function GetCustomerId($email){

	global $db;
	
	$sql = "SELECT customer_id from customers WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;	
	
}

function grabCustomerHash($email){
	global $db;
	
	$sql = "SELECT password from customers WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;
	
	
}	

function isCustomerEmailUnique($email){
	global $db;
	
	$sql = "SELECT * from users WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;
	
}


?>