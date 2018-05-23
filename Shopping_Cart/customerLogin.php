<!-- Login for customer -->
<!DOCTYPE HTML>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

	</head>
	<body style='background-color:#AFAFAF; font-family: Lora;'  >
		<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;' class="border border-dark rounded col-md-4 col-md-offset-4" > 
			<h1> Customer Login </h1>
			<form action="index.php" method="post">
				<label> Email </label>
				<input type="text" name="customerEmail" value="" > </input>
				<label> Password </label>
				<input type="password" name="customerPW" value="" > </input>

				<input type="submit" name="action" value="Customer Login"> </input>
				<a style="display:block" href="index.php?action=newCustomer"> New Customer? Register Here! </a>

			</form>
			<p style="color:red"> <?php echo $customerError; ?>  </p>
		</div>
	</body>
</html>