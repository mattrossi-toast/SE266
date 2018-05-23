<?php 
include_once("header.php");
include_once("categories.php");
$str = "<table class='table'>";

$str .= "<th>Product Name </th>"; 
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Quantity </th>";
foreach($_SESSION['cart'] as $product){// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table'>";
	$str .= "<td>" . $product['name']. "</td>";
	$str .= "<td>" . "$" . $product['price']. "</td>";
	$str .= "<td>" . getCategoryName($product['category']) . "</td>";
	$str .= "<td>" . $product['qty'] . "</td>";
	$total += ($product['price'] * $product['qty']);
}
$total += $total * $tax;
$str .= "</tr><tr><td> Total: $". $total ."</td></tr></table>";

if($action=="Logged In"){ // this page is reused. if you have just logged in, it asks for your info
$str .= "<form action='index.php' method='post'>";
$str .= "<label> Address Line One </label><input type='text' name='Address' value=''></input>";
$str .= "<label> Address Line Two </label><input type='text' name='Address2' value=''></input>";
$str .= "<label> State </label><input type='text' name='State' value=''></input>";
$str .= "<label> City </label><input type='text' name='City' value=''></input>";
$str .= "<label> Credit Card Number </label><input type='text' name='CCNumber' value=''></input>";
$str .= "<input type='submit' name='action' value='Confirm Sale'> </input></form>";

}
if($action=="Confirm Sale"){ // if you are confirming the sale, it redisplays your info
$str .= "<h3> Is This Information Correct? </h3>";
$str .= "<label> Address Line One </label><br /><label>" . $Address ."</label> <br />";
$str .= "<label> Address Line Two </label> <br /><label>" . $Address2 ."</label> <br />";
$str .= "<label> State </label><br /><label>" . $State ."</label><br />";
$str .= "<label> City </label><br /><label>" . $City ."</label><br />";
$str .= "<label> Credit Card Number </label><br /><label>" . $CCNumber ."</label><br />";
$str .= "<form action='index.php' method='get'><input type='submit' name='action' value='Confirm'> </input> <input type='submit' name='action' value='Back'> </input></form>";
	
}


?>

<h1> Cart </h1>

<div>
<?php echo($str) ?>
</div>

<?php include_once("footer.php"); ?>

