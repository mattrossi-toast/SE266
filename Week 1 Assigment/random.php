<?php
//Matthew Rossi, SE266 Assignment 1
	$size = 10;
	$table = "<table>\n";
	$random = "";
	$colorsArray = array();
	
	$loopCount = 0;
	for($colors = 0; $colors < 100; $colors++){ //loop through 100 times, creating random colors and storing them in array
	for($hex = 1; $hex <= 6; $hex++){
	
	$num = mt_rand(0, 15); // generate a random number from 0-15
	
	switch($num){ //since we are using hex, if the number is 10-15 change it to corresponding letter
	
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
	$random .= $num; // put them all into a string
	}
	
	$colorsArray[] = $random; // store string into array
	$random = ""; // clear string
	}
	
	
	
	for ($rows = 1; $rows <= $size; $rows ++){ // use nested for loops and a counter to populate table
	
	$table .= "\t<tr>\n";
	for($columns = 1; $columns <= $size; $columns++){
	
	 $table .= "<th style='background-color:#" . $colorsArray[$loopCount] . "; width:50px; height:50px'>" . $colorsArray[$loopCount] . "<br /> <span style='color:white'>" . $colorsArray[$loopCount] . "</span>" . "</th>";
	 $loopCount++; 
	}
	
	$table .="\t</tr>\n"; //close row
	
	}
	$table .= "</table>\n"; //close table
?>

<!DOCTYPE html>
<html>
<body>
<?php
echo $table ?>

</body>
</html>
