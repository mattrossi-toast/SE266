<?php 
if($_SESSION['customer_id'] != null){ //if you're logged in as a customer, show the view orders button
	$str = "<form action='index.php' method='get'><input type=submit name='action' value = 'View Orders' style='float:right; clear:right;'> </input><input type=submit name='action' value = 'Customer Logout' style='float:right; clear:right;'> </input></form>";
}

if($action != "View Cart"){ // if youre not currently viewing the cart, give the view cart button
	$str.="<form action='index.php' method='get'>";
$str.="<input type=submit name='action' value = 'View Cart' style='float:right; clear:right;'> </input>";
$str.="</form>";
}

?>


<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
</head>
<body style='background-color:#DFDFDF; font-family: Lora;'>


<?php echo($str); ?>
<form action='index.php' method='get'>
<input type=submit name='action' value = 'Admin Page' style="float:left; clear:both;"> </input>

</form>

