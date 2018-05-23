<?php include_once("header.php") ?>
<h1 style="text-align:center"> Customer Registration </h1>
<div style='margin:auto; width:75%;'>
<form action="index.php" method="Post">
<label style="display:block"> Email </label>
<input type="text" name="customerEmailReg" value="" > </input>
<label style="display:block"> Confirm Email </label>
<input type="text" name="customerEmailRegConf" value="" > </input>
<label style="display:block"> Password </label>
<input type="password" name="customerPwReg" value="" > </input>
<label style="display:block"> Confirm Password </label>
<input type="password" name="customerPwRegConf" value="" > </input>
<input type="submit" name="action" value="Register Customer"> </input>

</form>
</div>

<?php include_once("footer.php") ?>