<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body style='background-color:#DFDFDF; font-family: Lora;'>

<form action='index.php' method='get'>
<input type=submit name='action' value = 'Menu'> </input>
</form>
<?php
if($_SESSION["AdminLoggedIn"] == null){
	
	header("Location: index.php?action=Admin Page"); // stops pesky users from sneaking into admin sites using url params
}

?>