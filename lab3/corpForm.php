<!-- Form users see when inputting Corporation Data -->
<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	</head>
	<body style='background-color:#283593;color:white;' >
		<form method = 'get' action = 'index.php'>
			<label for = 'corp'> Corporation Name</label><input type='text' name = 'corp' id = 'corp' value=""></input> <br />
			<label for = 'email'>Email: </label><input type='text' name = 'email' id = 'email' value =""></input><br />
			<label for = 'zipcode'> Zip Code</label><input type='text' name = 'zipcode' id = 'zipcode' value =""></input> <br />
			<label for = 'owner'>Owner name: </label><input type='text' name = 'owner' id = 'owner' value =""></input> <br />
			<label for = 'phone'>Phone: </label><input type='text' name = 'phone' id = 'phone' value =""></input><br />
			<input type='submit' name = 'action' value = 'Save' class="btn btn-success"> </input>
		</form>
	</body>
</html>

