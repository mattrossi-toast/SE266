<?php
// Model File for Order Items Table
function AddToOrderItems($order_id, $product_id, $price, $qty){
global $db;
	$sql = "INSERT INTO orderitems(order_id, product_id, price_paid, quantity) VALUES(:order_id, :product_id, :price_paid, :quantity)";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':order_id', $order_id);
	$stmt->bindParam(':product_id', $product_id);
	$stmt->bindParam(':price_paid', $price);
	$stmt->bindParam(':quantity', $qty);

	$stmt->execute();
	
}

function GrabOrderItemsById($order_id){
	global $db;
	
$sql = "SELECT * FROM orderitems WHERE order_id = :order_id";

$stmt = $db ->prepare($sql);

$stmt->bindParam(':order_id', $order_id);


$stmt->execute();
$results = $stmt->fetchAll();

return $results;
	
}

?>