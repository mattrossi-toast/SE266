<?php
include_once("adminHeader.php");
?>

<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class="border border-dark rounded col-md-4 col-md-offset-4" > 
<h1> Add A Product </h1>
<form action ="index.php" method="get">
<label> Category Name </label>
<input type="text" name="catname" value="" > </input>

<input type="submit" name="action" value="Add Category"> </input>

</form>
<p> <?php echo($addCatString); ?> </p>
</div>