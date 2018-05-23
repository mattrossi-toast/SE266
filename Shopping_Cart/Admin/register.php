<?php include_once("adminHeader.php") ?>
<h1 style="text-align:center"> Admin Registration </h1>
<form action="index.php" method="Post">
<label> Email </label>
<input type="text" name="emailReg" value="" > </input>
<label> Confirm Email </label>
<input type="text" name="emailRegConf" value="" > </input>
<label> Password </label>
<input type="text" name="pwReg" value="" > </input>
<label> Confirm Password </label>
<input type="text" name="pwRegConf" value="" > </input>
<input type="submit" name="action" value="Register"> </input>

</form>

<?php include_once("footer.php") ?>