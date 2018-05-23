<?php
//Section for creating new products
	include_once("adminHeader.php");
		include_once("categories.php");
		$categoryDropDown = pullCategoriesForDropDown();
?>
<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class="border border-dark rounded col-md-4 col-md-offset-4" > 
<h1> Add A Product </h1>
<form action ="index.php" method="post" enctype="multipart/form-data">
<label> Product Name </label>
<input type="text" name="productname" value="" > </input>
<label> Price </label>
<input type="text" name="price" value=""> </input>
<label> Category</label>
<select style="color:black;" name="category_id">
  <?php foreach($categoryDropDown as $category):?>
       <option value="<?php echo($category['category_id']); ?>" <?php  echo $category_id == $category['category_id'] ? 'selected = "selected "' : ''?>><?= $category['category']; ?></option>
    <?php endforeach; ?> 
</select>
<input type="file" name="image" />
<!-- NOTE: Want images that are uploaded to be consistent in size and have decent thumbnails -->
<input type="submit" name="action" value="Save"> </input>

</form>
</div>