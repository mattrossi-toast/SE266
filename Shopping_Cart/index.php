<?php 

//Matthew Rossi Shopping Cart Project SE266
session_start();

error_reporting(0);

require_once("db.php");
include_once("models/products.php");
include_once("models/orders.php");
include_once("models/users.php");
include_once("models/categories.php");
include_once("models/customers.php");



$action = $_REQUEST["action"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$customerEmail = $_POST["customerEmail"];
$customerPW = $_POST["customerPW"];
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
$product_id_mod = $_GET["product_id_mod"];
$old_image = $_POST["old_image"];
$qty = $_GET['qty'];
$customerEmailReg = $_POST['customerEmailReg'];
$customerEmailRegConf = $_POST['customerEmailRegConf'];
$customerPwReg = $_POST['customerPwReg'];
$customerPwRegConf = $_POST['customerPwRegConf'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$CCNumber = $_POST['CCNumber'];
$customer_id = $_GET['customer_id'];
$price_paid = $_GET['price_paid'];
$order_id = $_GET['order_id'];

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
	//Admin cases first
	case "Menu":
	include_once("Admin/admin.php");
	break;
	
	case "Admin Page":
	if($_SESSION['AdminLoggedIn'] == null){
	include_once("Admin/login.php");
	}
	
	else{
	include_once("Admin/admin.php");
	}
	break;
	
	case "newUser":
	include_once("register.php");
	break;
	
	case "Register":
	include_once("register.php");
	if(($emailReg == $emailRegConf) && ($pwReg == $pwRegConf)){
		if(preg_match("/[a-zA-Z0-9_]{2,}@[a-zA-Z0-9_]{2,}?\.[a-zA-Z]{2,3}/", $emailReg)){
			$pwHash = password_hash($pwReg, PASSWORD_DEFAULT);
			echo(addUser($emailReg, $pwHash));
		}	
	}
	break;
	
	case "login":
	include_once("login.php");
	include_once("models/users.php");
	$hashToVerify = grabHash($email);
	if(password_verify($pw, $hashToVerify[0]["password"])){
		
		$_SESSION['AdminLoggedIn'] = 1;
		header("Location:index.php?action=Menu");
		
	}
	
	else{
		
		$error = "Password or Email is Incorrect.";
	}
	include_once("Admin/login.php");
	break;
	
	case "Logout":
	$_SESSION['AdminLoggedIn'] = '';
	header("Location: index.php");
	break;
	// Kept Customer Logout close to Logout for ease
	case "Customer Logout":
	$_SESSION['customer_id'] = '';
	header("Location: index.php");
	break;
	case "Create":
		include_once("Admin/create.php");
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

	AddAProduct($prodName, $prodPrice, $prodCat, $file_name);
	include_once("Admin/create.php");
	break;
		
	case "Read":
	include_once("main.php");
	$products = GetProducts();	
	include_once("productTable.php");
	break;	
	
	case "Update":	

	$products = GetProducts();	
	include_once("Admin/productUpdateTable.php");
	break;	
	
	case "Update Product":
	$product = GetOneProduct($product_id);
	include_once("Admin/update.php");
	break;	
	
	case "Save Update":
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
		
		echo("Sorry! That Didn't Work, Either your image was too large, or it wasn't the proper file type");
	}
}

	else{
		
		$file_name = $old_image; // in case no new image was added, just keep the old one
	}
	UpdateProduct($product_id, $prodCat, $prodName, $prodPrice,  $file_name);
	$products = GetProducts();	
	include_once("Admin/productUpdateTable.php");
	break;	
	
	case "Delete":
	$products = GetProducts();		
	include_once("Admin/productUpdateTable.php");
	break;
	
	case "Delete Product":
	DeleteProduct($product_id);
	$products=GetProducts();
	$action = "delete";
	include_once("Admin/productUpdateTable.php");
	break;
	
	case "Create Category":
	include_once("Admin/createCat.php");
	break;
	
	case "Add Category":
		
		$IsUnique = IsCategoryUnique($cat_name);
		if($IsUnique){
			$addCatString = "Category Already Exists!";
		}
		
		else{
		$addCatString = AddACategory($cat_name);
		}
		include_once("Admin/createCat.php");
	break;
	
	case "Edit A Category":
	

	$categoryDropDown = pullCategoriesForDropDown();
	include_once("Admin/editCat.php");
	break;
	
	case "Edit Category":

	EditACategory($newCatName, $category_id);
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("Admin/editCat.php");
	break;
	
	case "Delete A Category":

	$categoryDropDown = pullCategoriesForDropDown();
	include_once("Admin/deleteCat.php");
	break;
	
	case "Delete Category":

	$categoryCheck = IsCategoryEmpty($category_id);
	if(empty($categoryCheck)){
	DeleteACategory($category_id);
	}
	else{
		echo("Sorry, Category Must Be Empty Before Deleting!");
	}
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("Admin/deleteCat.php");
	break;
	// NON ADMIN CASES
	case "View":
		$categoryDropDown = pullCategoriesForDropDown();
		include_once("main.php");
		if($category_id == "All"){
			$products = GetProducts();
		}
		else{
		$products = IsCategoryEmpty($category_id);
		}
		include_once("productTable.php");
		break;
		
	case "View More":
		$categoryDropDown = pullCategoriesForDropDown();
		include_once("main.php");
		
		$product = GetOneProduct($product_id);
		include_once("viewMore.php");
		break;
	case "View Cart":
	include_once("cart.php");
	break;
	case "Add to Cart":
	
		$product = GetOneProduct($product_id);
		$product_id_string = strval($product_id);
		// Setting all the cart variables in the session
		if(is_null($_SESSION['cart'][$product_id_string])){
			$_SESSION['cart'][$product_id_string]['name'] = $product['product'];
			$_SESSION['cart'][$product_id_string]['price'] = $product['price'];
			$_SESSION['cart'][$product_id_string]['category'] = $product['category_id'];
			$_SESSION['cart'][$product_id_string]['id'] = $product_id_string;
			$_SESSION['cart'][$product_id_string]['qty'] = 1;
		}
	
		else{
		$_SESSION['cart'][$product_id_string]['qty'] = $_SESSION['cart'][$product_id_string]['qty'] + 1;
		}
		
		header('Location: index.php?action=View+Cart');
		
	break;
	
	case "Modify Quantity":

		include_once("cart.php");
		break;
		
	case "Confirm Changes":
	$_SESSION['cart'][$product_id_mod]['qty'] = $qty;
	$product_id_mod = '';
	include_once("cart.php");
	
	case "Check Out":
	include_once("customerLogin.php");
	break;
	//New customer registration
	case "newCustomer":
	include_once("customerRegister.php");
	break;
	
	case "Register Customer":
	
	if(($customerEmailReg == $customerEmailRegConf) && ($customerPwReg == $customerPwRegConf)){
		
		if(preg_match("/[a-zA-Z0-9_]{2,}@[a-zA-Z0-9_]{2,}?\.[a-zA-Z]{2,3}/", $customerEmailReg)){	
			if(empty(isCustomerEmailUnique($customerEmailReg))){
			include_once("models/customers.php");
			$customerPwHash = password_hash($customerPwReg, PASSWORD_DEFAULT);
			echo(addCustomer($customerEmailReg, $customerPwHash));
			include_once("customerLogin.php");
			}
			
			else{
				echo("Sorry, that email is taken!");
				
			}
		}		
		
	}
	include_once("customerRegister.php");
	
	break;
	
	case "Customer Login":

	include_once("models/customers.php");	
	$hashToVerify = grabCustomerHash($customerEmail);
	if(password_verify($customerPW, $hashToVerify[0]['password'])){
		$_SESSION['customer_id'] = GetCustomerId($customerEmail);
		header("Location:index.php?action=Logged In");
	}
	
	else{
		$customerError = "Password or Email is Incorrect.";
	}
	include_once("customerLogin.php");	
	break;
	
	case "Logged In":
	include_once("sale.php");
	break;
	//Final step of sale	
	case "Confirm Sale":
	if($State == "RI" || $State == "Rhode Island"){
		$_SESSION['tax'] = .07;
	}
	
	else{
		$_SESSION['tax'] = 0;
	}
	
	include_once("sale.php");
	break;
	
	case "Confirm":
	
	$customer_id = $_SESSION['customer_id'];
	$last_id = AddToOrders($customer_id, $_SESSION['tax']);
	foreach($_SESSION['cart'] as $product){
	include_once("models/orderItems.php");
	AddToOrderItems($last_id, $product['id'], $product['price'], $product['qty']);
}
	session_destroy(); // wipe out session
	echo("Order Placed! Thank You!");
	
	$categoryDropDown = pullCategoriesForDropDown();
	include_once("main.php");
		$products = GetProducts();
		
		include_once("productTable.php");
	break;
	
	case "View Orders":
	$orders = GrabOrdersById($_SESSION['customer_id']); // only get customers orders
	include_once("viewOrders.php");
	break;
	case "View Order":
	include_once("models/orderItems.php");
	$orderItems = GrabOrderItemsById($order_id); // use last id to grab order items
	include_once("viewOrderItems.php");
	break;
	
	case "Back to Orders":
	if($_SESSION["AdminLoggedIn"] == null){ 
		header("Location:index.php?action=View Orders");
	}
	else{
	header("Location: index.php?action=View All Orders");
	}
	case "View All Orders":

	$orders = GrabAllOrders();
	include_once("viewOrders.php");
	break;
	
	
	case "Delete Cart":
	$_SESSION['cart'] = "";

	default:	
		$categoryDropDown = pullCategoriesForDropDown();		
		include_once("main.php");
		$products = GetProducts();	
		include_once("productTable.php");
		
	
	
}





?>