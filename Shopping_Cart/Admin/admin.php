<!-- Hub for Admin Functions -->
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body style='background-color:#DFDFDF; font-family: Lora;'  >
<h1 style='text-align:center'> Admin Toolkit </h1>
<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class=" col-md-4 col-md-offset-4" > 

<form action = "index.php" method="Get">
<input type="submit" name = "action" value="Create"></input>
<input type="submit" name = "action" value="Read"></input>
<input type="submit" name = "action" value="Update"></input>
<input type="submit" name = "action" value="Delete"></input>
<input type="submit" name = "action" value="Create Category"></input>
<input type="submit" name = "action" value="Edit A Category"></input>
<input type="submit" name = "action" value="Delete A Category"></input>
<input type="submit" name = "action" value="View All Orders"></input>
<input type="submit" name = "action" value="Logout"></input>
</form>
</div>

<?php include_once("../footer.php"); ?>