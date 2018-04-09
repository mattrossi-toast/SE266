<?php 
//Matthew Rossi, Lab 2, SE266
error_reporting(0);
require_once("db.php");
require_once("corps.php");
$action = '';
$action = $_REQUEST['action'];
$corp = $_POST['corp'];
$incorp_dt = $_POST['incorp_dt'];
$email = $_POST['email'];
$zipcode = $_POST['zipcode'];
$owner = $_POST['owner'];
$phone = $_POST['phone'];
$id = $_POST['id'];
switch($action){
	
	case "Add":
	//If the case is add, pull up the form
		include_once("corpForm.php");
		break;
	
	case "Save":
		saveCorp($corp, $incorp_dt, $email, $zipcode, $owner, $phone);
		//get all rows		
		$corps = getRows();
		//display rows	by calling in CorpTable
		include_once("corpTable.php");
		break;
	case "Read":
		$corps = getRowById($db, $id);
		include_once("corpTable.php");
		break;
	default:
		//get all rows		
		$corps = getNames();
		//display rows	by calling in CorpTable
		include_once("corpTable.php");
		
}



?>