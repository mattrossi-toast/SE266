<?php

include_once("categories.php");
if(is_null($_SESSION["AdminLoggedIn"])){
	
	include_once("header.php");
}

else{
	include_once("adminHeader.php");
}

include_once("main.php");
$str = "<table class='table'>" ;

$str .= "<th> Product ID </th>";
$str .= "<th>Price Paid</th>";
$str .= "<th>Quantity</th>";
foreach($orderItems as $orderItem){ // same as with orders
// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table'>";
	$str .= "<td>" . $orderItem['product_id']. "</td>";
	$str .= "<td>" . $orderItem['price_paid']. "</td>";	
	$str .= "<td>" . $orderItem['quantity']. "</td>";	

	
}
$str .= "</tr></table>";
?>

<div>
<form action="index.php" method="get">
<input type="submit" name="action" value="Back to Orders"></input>
</form>
<h1> Order Items</h1>
<?php echo $str ?> <!--Echo Table below button -->

</div>
<?php include_once("footer.php"); ?>
