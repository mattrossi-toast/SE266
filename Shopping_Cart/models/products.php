<?php 
// Model file for Products table
function AddAProduct($name, $price, $category_id, $file_name){
	global $db;	
	var_dump($name, $price, $category_id, $file_name);
	//Insert data given by user into database
	try{
	$sql = "INSERT INTO products (product_id, category_id, product, price, image) VALUES (NULL, :category_id, :product, :price, :file_name)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category_id', $category_id);
	$stmt->bindParam(':product', $name);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':file_name', $file_name);
	
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch(PDOException $e){
		echo('Error: ' . $e->getMessage());
	}
	
	
}

function IsCategoryEmpty($category_id){
	global $db;	
	//Insert data given by user into database
	$sql = "SELECT * FROM products WHERE category_id = :category_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category_id', $category_id);
	$stmt->execute();
	$results = $stmt->fetchAll();

return $results;
	
	
}
function GetProducts(){
	
	global $db;	
	//Insert data given by user into database
	$sql = "SELECT * FROM products";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
		
}

function GetOneProduct($product_id){
		global $db;	
	//Insert data given by user into database
	$sql = "SELECT * FROM products WHERE product_id = :product_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':product_id', $product_id);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results[0];
}

function UpdateProduct($product_id, $category_id, $product, $price, $file_name){
	global $db;
	try{
	
	$sql = "UPDATE products SET category_id = :category_id, product = :product, price = :price, image = :file_name WHERE product_id = :product_id";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':product_id', $product_id);
	var_dump($product_id, $category_id, $product, $price, $file_name);
	$stmt->bindParam(':category_id', $category_id);
	$stmt->bindParam(':product', $product);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':file_name', $file_name);
	
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch(PDOException $e){
		echo('Error: ' . $e->getMessage());
	}
}

function DeleteProduct($product_id){
	global $db;
	try{
	
	$sql = "DELETE FROM products WHERE product_id = :product_id";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':product_id', $product_id);
	$stmt->execute();
	
	}
	catch(PDOException $e){
		echo('Error: ' . $e->getMessage());
	}
}


	
	

?>