<?php 

$dsn = "mysql:host=localhost;dbname=PHPClassSpring2018";
$userName = "PHPClassSpring2018";
$pWord = "SE266";

try{
	
	$db = new PDO($dsn, $userName, $pWord);	
	
} catch(PDOException $e){
	
	die("Cannot Connect to the Database");	
}

?>