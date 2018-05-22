<?php 
require_once("db.php");
error_reporting(0);
$action = $_REQUEST["action"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$emailReg = $_POST["emailReg"];
$emailRegConf = $_POST["emailRegConf"];
$pwReg = $_POST["pwReg"];
$pwRegConf = $_POST["pwRegConf"];
$cat_name = $_GET["catname"];
$newCatName = $_GET["newCatName"];
$category_id = $_GET["category_id"];
$prodName = $_POST["productname"];
$prodPrice = $_POST["price"];
$prodCat = $_POST["category_id"];
$product_id = $_REQUEST["product_id"];
$old_image = $_POST["old_image"];
$itemsInCart= 0;
if(isset($_FILES['image'])){//files are stored in $_FILES global variable, rather than $_POST or $_GET
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name']; //when uploaded, server will give file temporary name that is mostly random
	$file_type = $_FILES['image']['type']; //Not file extension, taken from header
	$file_ext = strtolower(end(explode('.', $_FILES['image']['name']))); // grab file extension from file name
	//Should add validation to make sure the image is a jpg, png, gif.
	//Recommendation - Use item number etc to name file
	//Don't store image into db, store into folder
	
}

switch($action){
	
	case "Menu":
	include_once("admin.php");
	break;
	
	case "newUser":
	include_once("register.php");
	break;
	
	case "Register":
	include_once("register.php");
	if(($emailReg == $emailRegConf) && ($pwReg == $pwRegConf)){
		if(preg_match("/[a-zA-Z0-9_]{2,}@[a-zA-Z0-9_]{2,}?\.[a-zA-Z]{2,3}/", $emailReg)){
			
			include_once("users.php");
			$pwHash = password_hash($pwReg, PASSWORD_DEFAULT);
			echo(addUser($emailReg, $pwHash));
		}
		
		
	}
	
	else{
		var_dump("Hey");
		echo($pwReg);
		echo("BREAK");
		echo($pwRegConf);
	}
	
	break;
	
	case "login":
	include_once("login.php");
	include_once("users.php");
	$hashToVerify = grabHash($email);
	var_dump($hashToVerify[0]["password"]);
	if(password_verify($pw, $hashToVerify[0]["password"])){
		
		$loggedIn = true;
		header("Location:admin.php");
		
	}
	
	else{
		
		var_dump("FAIL");
	}
	break;
	
	case "create":
		

		include_once("create.php");
		break;
		
	case "Save":
	
	if(isset($_FILES['image'])){//files are stored in $_FILES global variable, rather than $_POST or $_GET
	if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "png" ){
		$errors = true;
	}
	
	if($file_size > 2000000){
		
		$errors = true;
	}
	
	else{
		$errors = false;
	}
	if($errors == false){// No error checking is done, this is just for show
	move_uploaded_file($file_tmp, "images/" . $file_name);
	}
	
	else{
		
		echo("Sorry! That Didn't Work");
	}
}
	include_once("products.php");
	AddAProduct($prodName, $prodPrice, $prodCat, $file_name);
	include_once("create.php");
		break;
		
	case "read":
	include_once("products.php");
	$products = GetProducts();	
	include_once("productTable.php");
	break;	
	
	case "update":	
	include_once("products.php");
	$products = GetProducts();	
	include_once("productUpdateTable.php");
	break;	
	
	case "Update Product":
	include_once("products.php");
	$product = GetOneProduct($product_id);
	include_once("update.php");
	break;	
	
	case "Save Update":
	include_once("products.php");
	if($_FILES['image']["name"] != ""){//files are stored in $_FILES global variable, rather than $_POST or $_GET
	if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "png" ){
		$errors = true;
	}
	
	if($file_size > 2000000){
		
		$errors = true;
	}
	
	else{
		$errors = false;
	}
	if($errors == false){
	move_uploaded_file($file_tmp, "images/" . $file_name);
	}
	
	else{
		
		echo("Sorry! That Didn't Work");
	}
}

	else{
		
		$file_name = $old_image;
	}
	UpdateProduct($product_id, $prodCat, $prodName, $prodPrice,  $file_name);
	$products = GetProducts();	
	include_once("productUpdateTable.php");
	break;	
	
	case "delete":
	include_once("products.php");	
	$products = GetProducts();		
	include_once("productUpdateTable.php");
	break;
	
	case "Delete Product":
	include_once("products.php");
	DeleteProduct($product_id);
	$products=GetProducts();
	$action = "delete";
	include_once("productUpdateTable.php");
	break;
	case "Create Category":
		
		include_once("createCat.php");
		break;
	case "Add Category":
		include_once("categories.php");
		
		$IsUnique = IsCategoryUnique($cat_name);
		if($IsUnique){
			$addCatString = "Category Already Exists!";
		}
		
		else{
		$addCatString = AddACategory($cat_name);
		}
		include_once("createCat.php");
	break;
	
	case "Edit A Category":
	
	include_once("categories.php");
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("editCat.php");
	break;
	
	case "Edit Category":
	include_once("categories.php");
	EditACategory($newCatName, $category_id);
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("editCat.php");
	break;
	
	case "Delete A Category":
	include_once("categories.php");
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("deleteCat.php");
	break;
	
	case "Delete Category":
	include_once("categories.php");
	include_once("products.php");
	$categoryCheck = IsCategoryEmpty($category_id);
	var_dump($categoryCheck);
	if(empty($categoryCheck)){
	DeleteACategory($category_id);
	}
	else{
		echo("Sorry, Category Must Be Empty Before Deleting!");
	}
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("deleteCat.php");
	break;
	
	case "view":
	include_once("categories.php");
		$categoryDropDown = pullCategoriesForDropDown();
		include_once("main.php");
		include_once("products.php");
		$products = IsCategoryEmpty($category_id);
		include_once("productTable.php");
	
	default:	
		include_once("categories.php");
		$categoryDropDown = pullCategoriesForDropDown();
		include_once("main.php");
		include_once("products.php");
		$products = GetProducts();
		include_once("productTable.php");
		
	
	
}





?>