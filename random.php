<?php

	$size = 10;
	$table = "<table>\n";
	function randColor(){
	$random = "#";
	for($colors = 1; $colors <= 6; $colors++){
	
	
	
	$num = mt_rand(0, 15);
	
	switch($num){
	
	case 10:
		$num = "A";
	break;
	
	case 11:
		$num = "B";
	break;
	
	case 12:
		$num = "C";
	break;
	
	case 13:
		$num = "D";
	break;
	case 14:
		$num = "E";
	break;
	
	case 15:
		$num = "F";
	break;
	
	default:
		$num = $num;
	}
	$random .= $num;
	}
	
	return $random;
	}
	
	
	for ($rows = 1; $rows <= $size; $rows ++){
	
	$table .= "\t<tr>\n";
	for($columns = 1; $columns <= $size; $columns++){
	$rand = randColor();
	
	 $table .= "<th style='background-color:" . $rand . "; width:50px; height:50px'>" . $rand . "<p style='color:white'>" .$rand . "<p>" . "</th>";
	}
	
	$table .="\t</tr>\n";
	
	}
	$table .= "</table>\n";
?>

<!DOCTYPE html>
<html>
<body>
<?php
echo $table ?>

</body>
</html>
