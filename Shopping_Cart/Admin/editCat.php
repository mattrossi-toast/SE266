<?php include_once("adminHeader.php"); 
//Section for editing categories
?>
 <div  style ='position:relative; top:450px; background-color:#EDEDED; text-align:center; line-height:auto; box-shadow: 5px 10px 10px #888888;
' class="border border-dark rounded col-md-4 col-md-offset-4" > 
<h1> Edit Category </h1>
<form action ="index.php" method="get">
<label> Old Name </label>
<select style="color:black;" name="category_id">
  <?php foreach($categoryDropDown as $category):?>
       <option value="<?php echo($category['category_id']); ?>" <?php  echo $category_id == $category['category_id'] ? 'selected = "selected "' : ''?>><?= $category['category']; ?></option>
    <?php endforeach; ?> 
</select>
<label> New Name </label>
<input type="text" name="newCatName" value="" > </input>
<input type="submit" name="action" value="Edit Category"> </input>

</form>
</div>