<?php 
include_once("header.php");
include_once("categories.php");
$total = 0; // sum up total

$str = "<table class='table'>";

$str .= "<th>Product Name </th>"; 
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Quantity </th>";
foreach($_SESSION['cart'] as $product){// read in data to a string to format as table using bootstrap
	if($product_id_mod == $product["id"])
	{ 
	$quantityOpt = "<input type='text' name='qty' value='' style='width:25px';></input>";
	$buttonOpt = "Confirm Changes";
	} 

else // if/else to control the modify quanity function
{ 

$quantityOpt = $product['qty']; 
$buttonOpt = "Modify Quantity";
}
	$str .= "<tr class='table'>";
	$str .= "<td>" . $product['name']. "</td>";
	$str .= "<td>" . "$" . $product['price']. "</td>";
	$str .= "<td>" . getCategoryName($product['category']) . "</td>";
	$str .= "<td><form action='index.php' method='get'>" . $quantityOpt . "</td>";
	$str .= "<td><input type=submit name='action' value='".$buttonOpt."'><input type=hidden name='product_id_mod' value='" . $product['id'] . "'></input> </form></td>";
	$total += ($product['price'] * $product['qty']);
}

$str .= "</tr><tr><td> Total: $". $total ."</td></tr></table>";
?>

<h1 style="text-align:center"> Cart </h1>

<div>
	<?php echo($str) ?>
</div>
<form action="index.php" method="get">
	<input type=submit class="btn btn-danger" name="action" value="Delete Cart"> </input>
	<input type=submit class="btn btn-warning" name="action" value="Continue Shopping"> </input>
	<input type=submit class="btn btn-success" name="action" value="Check Out"> </input>
</form>



<?php include_once("footer.php"); ?>

