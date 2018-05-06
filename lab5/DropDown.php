<?php
//View
if($test == true){ // does foreach if printing all data
$str =  "<table>";	
	foreach($sites as $site){
	foreach($site as $link){

	$str .= "<tr class='table'>";
	$str .= "<td><a href='" . $link . "'>". $link ."</a></td></tr>";
	}
	}
}


$str .= "</table>";


?>
 <!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body style='background-color:#283593; color:white; font-family: Lora;' >
<form action="index.php" method="get">
<input type="submit" name = "action" value="Back"></input>
</form>
<form action="index.php" method = "Get">
<select style="color:black;" name="Site">
  <?php foreach($sitesDropDown as $site):?>
       <option value="<?php echo($site['site_id']); ?>" <?php  echo $site_id == $site['site_id'] ? 'selected = "selected "' : ''?>><?= $site['site']; ?></option>
    <?php endforeach; ?> 
</select>
<input type="Submit" name="action" value = "Search"> </input>

</form>
<div>

<?php

$date = strtotime($date[0]["date"]);

echo( "Date Stored: " . date('m/d/y h:m:s', $date));
echo(("<br/>" . count($sites) . " Records Retrieved"));
echo($str);
?>
</div>
</body>
</html>