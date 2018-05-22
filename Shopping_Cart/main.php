
<?php include_once("header.php"); ?>
<h2> Select A Category </h2>
<form action="index.php" method="get">
<?php foreach($categoryDropDown as $category):?>
       <button name='category_id' value='<?php echo($category['category_id']); ?>'> <?php echo($category['category']); ?></button>
    <?php endforeach; ?> 
	<input type="hidden" name="action" value="view"> </input>
</form>
</body>
</html>