<?php


include_once("models/categories.php");

if($action = "View All Orders"){ // if/else to determine which header to use and which text for the h1 tag
	include_once("adminHeader.php");
	$text = "All Orders";
	
}

else{
	include_once("header.php");
	$text = "Your Orders";
}

include_once("main.php");
//set up first row of table
$str = "<table class='table'>" ;

$str .= "<th> Order ID </th>";
$str .= "<th>Customer ID</th>";
$str .= "<th>Tax</th>";
$str .= "<th>Order Date </th>";
$str .= "<th>Ship Date</th>";



foreach($orders as $order){ //foreach to populate
// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table'>";
	$str .= "<td>" . $order['order_id']. "</td>";	
	$str .= "<td>" . $order['customer_id']. "</td>";
	$str .= "<td>" . $order['tax']. "</td>";	
	$str .= "<td>" . $order['order_date']. "</td>";
	$str .= "<td>" . $order['ship_date']. "</td>";			
	$str .= "<td><form action='index.php' method='get'>";
	$str .= "<button name='order_id' value='" . $order['order_id'] . "'>"  . "View More" . "</button> <input type='hidden' name='action' value='View Order'> </input> </form></td>";
	
}




	

$str .= "</tr></table>";
?>



<div>
<h1> <?php echo $text;?> </h1>
<?php echo $str ?> <!--Echo Table below button -->

</div>

<?php include_once("footer.php"); ?>