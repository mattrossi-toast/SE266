<?php

if(($action != null) && ( $action != 'view')){
include_once("adminHeader.php");

}
else{
$addLinks = true;
}
include_once("categories.php");


$str = "<table class='table'>" ;

$str .= "<th>Product Name </th>"; 
$str .= "<th> Price </th>";
$str .= "<th> Category </th>";
$str .= " <th> Image </th>";

foreach($products as $product){// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table'>";
	$str .= "<td>" . $product['product']. "</td>";
	$str .= "<td>" .'$'. $product['price']. "</td>";
	$str .= "<td>" . getCategoryName($product['category_id']) . "</td>";
	$str .= "<td><img height='50px' width='50px' src=images/". $product['image']  . "</img> </td>";
	if($addLinks == true)
	{
		
	$str .= "<td><form action='index.php' method='get'>";
	$str .= "<button name='product_id' value='" . $product['product_id'] . "'>"  . "Add To Cart" . "</button> </form></td>";
	} 
};
echo($addLinks);
	

$str .= "</tr></table>";
?>



<div>
<h1> </h1>
<?php echo $str ?> <!--Echo Table below button -->

</div>
</body>
