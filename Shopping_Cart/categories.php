<?php
function IsCategoryUnique($category){
	global $db;	
	//Insert data given by user into database
	$sql = "SELECT * FROM categories WHERE category = :category";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category', $category);
	$stmt->execute();
	$results = 	$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
	
}
function AddACategory($category){
	global $db;	

	$sql = "INSERT INTO categories (category) VALUES (:category)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category', $category);
	$stmt->execute();
}

function EditACategory($categoryUpdate, $category_id){
	global $db;	
var_dump($categoryUpdate, $category_id);
	$sql = "UPDATE categories SET category = :category WHERE category_id = :category_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category', $categoryUpdate);
	$stmt->bindParam(':category_id', $category_id);
	$stmt->execute();
}

function DeleteACategory($category_id){
	global $db;	
var_dump($category_id);
	$sql = "DELETE FROM categories WHERE category_id = :category_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':category_id', $category_id);
	$stmt->execute();
}

function pullCategoriesForDropDown(){ 
global $db; 
$sql = "SELECT * FROM categories";
$stmt = $db->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $categories;
}

function getCategoryName($category_id){
	global $db; 
$sql = "SELECT category FROM categories WHERE category_id = :category_id";


$stmt = $db->prepare($sql);
$stmt->bindParam(':category_id', $category_id);
$stmt->execute();
$categories = $stmt->fetchAll();

return $categories[0][0];
	
	
}


?>