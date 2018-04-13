<!-- Form to Edit Data -->
<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	</head>
	<body style='background-color:#283593; color:white;'>
		<form method = 'get' action = 'index.php'>
			<label for = 'corp'> Corporation Name</label><input type='text' name = 'corp' id = 'corp' value="<?php echo( htmlspecialchars( $corps['corp'] ) ); ?>"></input> <br />
			<label for = 'incorp_dt'>Date Incorporated: </label><input type='text' name = 'incorp_dt' id = 'incorp_dt' value ="<?php echo( htmlspecialchars( $corps['incorp_dt'] ) ); ?>"></input> <br />
			<label for = 'email'>Email: </label><input type='text' name = 'email' id = 'email' value ="<?php echo( htmlspecialchars( $corps['email'] ) ); ?>"></input><br />
			<label for = 'zipcode'> Zip Code</label><input type='text' name = 'zipcode' id = 'zipcode'value ="<?php echo( htmlspecialchars( $corps['zipcode'] ) ); ?>"></input> <br />
			<label for = 'owner'>Owner name: </label><input type='text' name = 'owner' id = 'owner' value ="<?php echo( htmlspecialchars( $corps['owner'] ) ); ?>"></input> <br />
			<label for = 'phone'>Phone: </label><input type='text' name = 'phone' id = 'phone' value ="<?php echo( htmlspecialchars( $corps['phone'] ) ); ?>"></input><br />
			<input type='submit' name = 'action' value = 'Update' class="btn btn-success"> </input>
			<input type='hidden' name = 'id' value =  <?php echo htmlspecialchars($id); ?> > </input>

		</form>

	</body>
</html>