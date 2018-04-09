<?php


$str = "<table class='table' style='position:absolute; top:50px;'>";
foreach($corps as $corp){
	$str .= "<tr class='table'>";
	$str .= "<td>" . $corp['corp']. '</td> ';
	$str .= "<td>" . $corp'incorp_dt']. '</td> ';
	$str .= "<td>" . $corp['email']. '</td> ';
	$str .= "<td>" . $corp['zipcode']. '</td> ';
	$str .= "<td>" . $corp['owner']. ' </td>';
	$str .= "<td>" . $corp['phone']. '</td> </tr> ';
	$str .= "<br />";
}

$str .= "</table>";

?>


<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>

<form action='index.php' method='get'> 
	<input type='submit' name='action' value='Add' ></input>	
</form>
<?php echo $str ?>
</body>
</html>

