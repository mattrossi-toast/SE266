<?php

if($test == false){ // does foreach if printing all data
$str = "<table class='table' style='position:absolute; top:100px; right:150px;  height:25%; width:75%; margin:auto; background-color:#42A5F5; border-radius:250px;' >";
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
$str = "<table class='table' style='position:absolute; top:100px; right:150px; height:25%; width:75%; margin:auto; background-color:#42A5F5;' >";
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
<body style='background-color:#283593; color:white;' >
	<div>
 <form action='index.php' method='get'> 
	<input style='position:relative; left: 320px;'type='submit' name='action' value='Add' class="btn btn-success" ></input>
	<select name="sortBy"  style='color:black'> 
	<option value='corp'>Corporation Name </option>
	<option value='incorp_dt'> Incorporation Date </option>
	<option value='email'> Email </option>
	<option value ='zipcode'> Zip Code </option>
	<option value = 'owner'> Owner Name </option>
	<option value = 'phone'> Phone Number </option>
	</select>
	<div>
    <input type="radio" id="ascDescChoice1"
     name="ascDesc" value="ASC" checked>
    <label for="Ascending">Ascending</label>

    <input type="radio" id="ascDescChoice2"
     name="ascDesc" value="DESC">
    <label for="Descending">Descending</label>

  </div>
  <div>
    <button type="submit" name="action" value="Sort">Submit</button>
  </div>
  
  <input type='text' name="searchBy" value='' style='color:black'></input>
  <input type='submit' name='action' value='Search' style='color:black'></input>
	
	
	</form>
<h1 style='margin:auto; text-align:center; color:white; font-family: Lora, serif;'> Corporation Finder </h1>

<?php echo $str ?> <!--Echo Table below button -->

</div>
</body>
</html>

