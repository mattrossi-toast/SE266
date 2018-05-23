<?php
		include_once("../categories.php");
		$categoryDropDown = pullCategoriesForDropDown();
?>
<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class="border border-dark rounded col-md-4 col-md-offset-4" > 
	<h1> Update Product </h1>
		<form action ="index.php" method="post" enctype="multipart/form-data">
		<label> Product Name </label>
		<input type="text" name="productname" value='<?php echo($product["product"]);?>'> </input>
		<label> Price </label>
		<input type="text" name="price" value='<?php echo($product["price"]);?>'> </input>
		<label> Category</label>
		<select style="color:black;" name="category_id">
			<?php foreach($categoryDropDown as $category):?>
				<option value="<?php echo($category['category_id']); ?>" <?php  echo $product['category_id'] == $category['category_id'] ? 'selected = "selected "' : ''?>><?= $category['category']; ?></option>
				<?php endforeach; ?> 
		</select>
	<input type="hidden" name="product_id" value=<?php echo($product[0]["product_id"]) ?>> </input>
	<input type="hidden" name="old_image" value=<?php echo($product[0]["image"]) ?>> </input>
	<input type="file" name="image" />
	<input type="submit" name="action" value="Save Update"> </input>

	</form>
</div>
<?php include_once("../footer.php"); ?>