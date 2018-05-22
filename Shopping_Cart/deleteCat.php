<?php
include_once("adminHeader.php");
?>

<div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto;' class="border border-dark rounded col-md-4 col-md-offset-4" > 
<h1> Delete Category </h1>
<form action ="index.php" method="get">
<label> Category </label>
<select style="color:black;" name="category_id">
  <?php foreach($categoryDropDown as $category):?>
       <option value="<?php echo($category['category_id']); ?>" <?php  echo $category_id == $category['category_id'] ? 'selected = "selected "' : ''?>><?= $category['category']; ?></option>
    <?php endforeach; ?> 
</select>

<input type="submit" name="action" value="Delete Category"> </input>

</form>
</div>