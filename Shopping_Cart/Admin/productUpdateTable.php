<?php
include_once("adminHeader.php");
include_once("../models/categories.php");

if($action == 'Delete')
{
$option = "Delete Product";
	
}

if($action == 'Update')
{
	$option = 'Update Product';
}

$str = "<table class='table'>";

$str .= "<th>Product Name </th>"; 
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Image </th>";
foreach($products as $product){// get all data from product
	$str .= "<tr class='table'>";
	$str .= "<td>" . $product['product']. "</td>";
	$str .= "<td>" . "$" . $product['price']. "</td>";
	$str .= "<td>" . getCategoryName($product['category_id']) . "</td>";
	$str .= "<td><img height='50px'  src=images/".$product['image']  . " </img> </td> <td> <form action='index.php' method='get'><input type=submit name='action' value='" . $option . "'> </input> <input type=hidden name='product_id' value=" . $product["product_id"] . "> </input></form> </td> </tr>";
}

$str .= "</table>";
?>



<div>

<?php echo $str ?> <!--Echo Table below button -->

</div>
<?php include_once("../footer.php"); ?>
