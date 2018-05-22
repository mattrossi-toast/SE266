<?php
include_once("adminHeader.php");
include_once("categories.php");

if($action == 'delete')
{
$option = "Delete Product";
	
}

if($action == 'update')
{
	$option = 'Update Product';
}

$str = "<table class='table'>";

$str .= "<th>Product Name </th>"; 
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Image </th>";
foreach($products as $product){// read in data to a string to format as table using bootstrap
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
</body>
