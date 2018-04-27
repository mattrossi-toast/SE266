<?php

if($test == false){ // does foreach if printing all data
$str=  "<table class='table' style='position:relative; bottom:1650px;margin:auto; background-color:#42A5F5; clear:both;' >";


foreach($corps as $corp){// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table' style='background-color:#42A5F5;'>";
	$str .= "<td>" . $corp['corp'].  "<form action='index.php' method='get'> 
	<input type='submit' name='action' value='Read' class='btn btn-primary'> </input><input type='submit' name='action' value='Edit' class='btn btn-warning'></input> <input type='submit' name='action' value='Delete' class='btn btn-danger'></input>	
<input type ='hidden' name='id' value='" . $corp['id'] ."' ></input></form></td></tr>";
	$str .= "<br />";
}

$str .= "</table>";
}
if($test == true){ // does only one if read function
$str=  "<table class='table' style='position:relative; bottom:1650px; margin:auto; background-color:#42A5F5;' >";
// read in data to a string to format as table using bootstrap
	$str .= "<tr class='table' style='background-color:#42A5F5;' >";
	$str .= "<td>" . $corps['corp']. "</td>";
	$str .= "<td>" . date('m/d/Y', strtotime($corps['incorp_dt'])) . '</td> ';
	$str .= "<td>" . $corps['email']. '</td> ';
	$str .= "<td>" . $corps['zipcode']. '</td> ';
	$str .= "<td>" . $corps['owner']. ' </td>';
	$str .= "<td>" . $corps['phone'];
	$str .= "<form action='index.php' method='get'> 
	<input type='submit' name='action' value='Edit' class='btn btn-warning'></input> <input type='submit' name='action' value='Delete' class='btn btn-danger'></input>	
<input type ='hidden' name='id' value='" . $corps['id'] ."' ></input> <input type='submit' name='action' value='Go Back' class='btn btn-success' ></input>	</form><br />";


$str .= "</table>";
}

?>


<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body style='background-color:#283593; color:white; font-family: Lora;' >

<h1 style='margin:auto; width:100%; clear:both;text-align:center; color:white; font-family: Lora, serif;'> Corporation Finder </h1>
	<!--div style="border:2px solid red; width:75%; margin:auto;"> -->
	
 <form action='index.php' method='get'> 
	<input type='submit'style="float:left;clear:both;" name='action' value='Add' class="btn btn-success" ></input>
	<div style='position:relative; float:left; clear:both;'>
	<!--I recall you saying in class there was a method to pull the column names from the db, but as the column names in the db are less user friendly I opted to name them manually, especially since there were not too many-->
	<select name="sortBy"  style='color:black; float:left'> 
	<option value='corp'>Corporation Name </option>
	<option value='incorp_dt'> Incorporation Date </option>
	<option value='email'> Email </option>
	<option value ='zipcode'> Zip Code </option>
	<option value = 'owner'> Owner Name </option>
	<option value = 'phone'> Phone Number </option>
	</select>
	<div style="float:left;">
    <input type="radio" id="ascDescChoice1"
     name="ascDesc" value="ASC" checked>
    <label for="Ascending">Ascending</label>

    <input type="radio" id="ascDescChoice2"
     name="ascDesc" value="DESC">
    <label for="Descending">Descending</label>

  </div>
  <button name="action" value="Sort" style="float:left; color:black;"> Sort</button>
  </div>
  <div style="float:left; clear:both;" >
  <input type='text' name="searchBy" value='' style='color:black'></input>
  <input type='submit' name='action' value='Search' style='color:black'></input>
</div>
	
	</form>
	<div>
<?php echo $str ?>
</div> <!--Echo Table below button -->

</body>
</html>

