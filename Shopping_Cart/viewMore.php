<?php	
//lets you see more of a product and add to cart
include_once("categories.php");
include_once("header.php");

$str = "<table class='table'>" ;

$str .= "<th>Product Name </th>";
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Image </th>";
$str .= "<tr class='table'>";
	$str .= "<td>" . $product['product']. "</td>";
	$str .= "<td>" .'$'. $product['price']. "</td>";
	$str .= "<td>" . getCategoryName($product['category_id']) . "</td>";
	$str .= "<td><img height='50px' width='50px' src='images/" . $product['image']  . "'</img></td><td><form action='index.php' method='get'><input type=submit name='action' value='Add to Cart'></input><input type=hidden name='product_id' value='".$product['product_id']."' </td></tr></table>";
	?>
<?php echo $str; ?> <!--Echo Table below button -->

</body>