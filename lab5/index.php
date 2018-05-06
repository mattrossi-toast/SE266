<?php 
//Matthew Rossi, Lab 5, SE266
//Controller
error_reporting(0);
require_once("db.php");
require_once("sites.php");
require_once("sitelinks.php");
$action = '';
$action = $_REQUEST['action'];
$searchFor = $_GET['searchFor'];
$site_id = $_GET['Site'];
$test = false;
switch($action){
	
	case "Add":

		$test = false;
		
		include_once("sites.php");
		include_once("sitelinks.php");
		//init error string
		$error="";
		//match input to regex
		preg_match("(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)", $searchFor, $matches, PREG_OFFSET_CAPTURE);
		if(count($matches) != 1){
			$error = "Sorry, Please Enter a Valid URL";
			echo($error);
		}
		
		else{
		$links = searchFor($searchFor); // Pull up all links store in array
		if(empty($links)){
			$error = "Sorry, no URLs found for that page, please try a different criteria"; //if no rows, show error
			
			echo $error;
		}
		
		elseif (count(isUnique($searchFor)) > 0){
		$error = "Sorry, this site has already been entered, please enter another"; //if site is not unique
			echo $error;
		
		}
		
		else{
			
			$last_id = addUrl($searchFor, $links);

			$siteLinkArray = addSiteLinks($last_id, $links);
			
			$feedbackString = "Added Website: " . $searchFor;
			$feedbackString .="<br/> With Links: ";
			foreach($siteLinkArray as $link){
				
				$feedbackString .= $link . "<br >";
				
			}
			
		}
		}
		include_once("siteTable.php");
		
		break;
	
	case "View":
		include_once("sites.php");
		include_once("sitelinks.php");
		$sitesDropDown = pullSitesForDropDown();
		$sites= grabURL($site_id);
		include_once("DropDown.php");		
		break;
		
	case "Search":
		$test = true;
		include_once("sites.php");
		include_once("sitelinks.php");
		$sitesDropDown = pullSitesForDropDown();
		$sites = grabURL($site_id);
		$date = grabDate($site_id);
		include_once("DropDown.php");
		break;
		
	case "Back":
		include_once("siteTable.php");
		break;

	default:
		include_once("siteTable.php");
		
}


?>