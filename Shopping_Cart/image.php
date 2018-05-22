<?php
if(isset($_FILES['image'])){//files are stored in $_FILES global variable, rather than $_POST or $_GET
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name']; //when uploaded, server will give file temporary name that is mostly random
	$file_type = $_FILES['image']['type']; //Not file extension, taken from header
	$file_ext = strtolower(end(explode('.', $_FILES['image']['name']))); // grab file extension from file name
	//Should add validation to make sure the image is a jpg, png, gif.
	//Recommendation - Use item number etc to name file
	//Don't store image into db, store into folder
	
	if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "png" ){
		$errors = true;
	}
	
	if($file_size > 2000000){
		
		$errors = true;
	}
	
	else{
		$errors = false;
	}
	if($errors == false){// No error checking is done, this is just for show
	var_dump("HEY!");
	move_uploaded_file($file_tmp, "images/" . $file_name);
	}
}



?>