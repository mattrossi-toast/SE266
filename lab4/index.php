<?php 
//Matthew Rossi, Lab 4, SE266
error_reporting(0);
require_once("db.php");
require_once("corps.php");
$action = '';
$action = $_REQUEST['action'];
$corp = $_GET['corp'];
$incorp_dt = $_GET['incorp_dt'];
$email = $_GET['email'];
$zipcode = $_GET['zipcode'];
$owner = $_GET['owner'];
$phone = $_GET['phone'];
$id = $_GET['id'];
$sortBy = $_GET['sortBy'];
$ascDesc = $_GET['ascDesc'];
$searchBy = $_GET['searchBy'];
$test = false;
switch($action){
	
	case "Add":
	//If the case is add, pull up the form
		include_once("corpForm.php");
		break;
	
	case "Save":
		saveCorp($corp, $email, $zipcode, $owner, $phone);
		
		//get all rows
		$test = false;	
		$corps = getNames();		
		//display rows	by calling in CorpTable
		include_once("corpTable.php");
		break;
	case "Read":
		$test = true;
		$corps = getRowById($db, $id);
		include_once("corpTable.php");
		break;

	case "Edit":
		$corps = getRowById($db, $id);
		include_once("corpFormEdit.php");
		break;
		
	case "Update":
		updateCorp($id, $corp, $incorp_dt, $email, $zipcode, $owner, $phone);
		//var_dump($result);
		include_once("corps.php");
		//get all rows		
		$corps = getNames();
		//display rows	by calling in CorpTable
		include_once("corpTable.php");
	break;
		
	
	case "Delete":
		include_once("delete.php");
		include_once("corps.php");
		deleteRows($id);
		break;
		
	case "Sort":

	$test = false;
		include_once("corps.php");
		$corps = sortRows($sortBy, $ascDesc); // call sort function, send column to sort by and ascending/descending opt
		echo("<form action='index.php' method='get'><input type='submit' name='action' value='Reset' style='color:black'></input></form>");//create reset button
		echo("Sorting by " . $sortBy . ", " . $ascDesc ."ENDING"); // show what you are sorting
		include_once("corpTable.php");
		break;
		
	case "Search":
		$test = false;
		include_once("corps.php");
		
		$corps = searchRows($searchBy);
		if(empty($corps)){
			echo("Sorry, no Results found for that search, please try a different criteria"); //if no rows, show error
		}
		
		else{
			echo(count($corps) . " Row(s) Returned.");//row count
		}
		echo("<form action='index.php' method='get'><input type='submit' name='action' value='Reset' style='color:black'></input></form>"); //reset button
		include_once("corpTable.php");
		break;
		
	
	default:
		//get all rows		
		$corps = getNames();
		//display rows	by calling in CorpTable
		include_once("corpTable.php");
		
}


?>