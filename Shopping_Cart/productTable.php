<?php
if($action == "read"){ // if else to determine which header to use
	include_once("adminHeader.php");
}
else{
	include_once("header.php");
}
include_once("categories.php");


$str = "<table class='table'>" ;

$str .= "<th>Product Name </th>";



foreach($products as $product){ // just show name and button
// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table'>";
	$str .= "<td>" . $product['product']. "</td>";	
	$str .= "<td><form action='index.php' method='get'>";
	$str .= "<button name='product_id' value='" . $product['product_id'] . "'>"  . "View More" . "</button> <input type='hidden' name='action' value='View More'> </input> </form></td>";
	
}




	

$str .= "</tr></table>";
?>


<div>
<h1> </h1>
<?php echo $str ?> <!--Echo Table below button -->

<?php include_once("footer.php"); ?>