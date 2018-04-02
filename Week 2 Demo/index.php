<?php 
require_once("db.php");
require_once("people.php");
$action = '';
$action = $_REQUEST['action'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$age = $_POST['age'];
switch($action){
	
	case "Add":
		include_once("personForm.php");
		break;
	
	case "Save":
		savePerson($db, $fName, $lName, $age);
		//get all rows		
		$people = getRows();
		//display rows	
		include_once("peopleTable.php");
		break;
	
	
	default:
		//get all rows		
		$people = getRows();
		//display rows	
		include_once("peopleTable.php");
		
}



?>