<?php

// Model File for Orders Table
function AddToOrders($customer_id, $tax){
	global $db;
	$sql = "INSERT INTO orders(customer_id, tax, order_date, ship_date) VALUES(:customer_id, :tax, NOW(), NOW())";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':customer_id', $customer_id[0]["customer_id"]);
	$stmt->bindParam(':tax', $tax);

	$stmt->execute();
	$last_id = $db->lastInsertId();
	
	return $last_id;
	
}

function GrabOrdersById($customer_id){
	global $db;
$sql = "SELECT * FROM orders WHERE customer_id = :customer_id";
$stmt = $db ->prepare($sql);
$stmt->bindParam(':customer_id', $customer_id[0]['customer_id']);
$stmt->execute();
$results = $stmt->fetchAll();

return $results;
	
}
function GrabAllOrders(){
	global $db;
$sql = "SELECT * FROM orders";
$stmt = $db ->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

return $results;
	
}
?>