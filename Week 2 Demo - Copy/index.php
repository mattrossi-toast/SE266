<?php 
error_reporting(0);
require_once("db.php");
require_once("people.php");
$action = '';
$action = $_REQUEST['action'];
$corp = $_POST['corp'];
$incorp_dt = $_POST['incorp_dt'];
$email = $_POST['email'];
$zipcode = $_POST['zipcode'];
$owner = $_POST['owner'];
$phone = $_POST['phone'];
switch($action){
	
	case "Add":
		include_once("corpForm.php");
		break;
	
	case "Save":
		saveCorp($corp, $incorp_dt, $email, $zipcode, $owner, $phone);
		//get all rows		
		$corps = getRows();
		//display rows	
		include_once("corpTable.php");
		break;
	
	
	default:
		//get all rows		
		$corps = getRows();
		//display rows	
		include_once("corpTable.php");
		
}



?>