
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body style='background-color:#DFDFDF; font-family: Lora;'  >
<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class="border border-dark rounded col-md-4 col-md-offset-4" > 
<h1> Admin Login </h1>
<form action="index.php" method="Post">
<label> Email </label>
<input type="text" name="email" value="" > </input>
<label> Password </label>
<input type="password" name="pw" value="" style='text-security:disc;' > </input>

<input type="submit" name="action" value="login"> </input>
<a style="display:block" href="index.php?action=newUser"> New User? Register Here! </a>
</form>
</div>
</body>
</html>