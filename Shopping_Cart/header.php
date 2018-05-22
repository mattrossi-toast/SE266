<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>

<form action='index.php' method='get'>
<h5 style="float:right">Items In Cart: <?php echo($itemsInCart); ?> </h5>
<input type=submit name='action' value = 'View Cart' style="float:right; clear:right;"> </input>
</form>
