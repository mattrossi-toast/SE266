<?php
require_once("index.php");


?>

<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body style='background-color:#283593; color:white; font-family: Lora;' >
<div style="width:100%; background-color:green;">
 <form action='index.php' method='get'> 
<input class="btn btn-success" style ="display:block;" type="submit" name="action" value="View"></input>
</form>
</div>
<h1 style='margin:auto; width:100%; clear:both;text-align:center; color:white; font-family: Lora, serif;'> Url Search </h1>

	
	
 <form action='index.php' method='get'> 

  <div style="float:left; clear:both;" >
  <input type='text' name="searchFor" value='' style='color:black'></input>
  <input class="btn btn-success" type='submit' name='action' value='Add' ></input>

	
</form>
<div style=" width:75%;margin:auto;">
<?php echo($feedbackString); ?>
</div>

</body>
</html>

