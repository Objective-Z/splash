<?php
$age = $_GET('age');
$weight = $_GET('weight');
$time = $_GET('time');
$heart = $_GET('heart');
$gender = $_GET('gender');
if ($gender == "male"){
	$cal = (0.2017 * $age - 0.09036 * $weight + 0.6309 * $heart - 55.0969) * $time / 4.184;
}
else{
	$cal = (0.074 * $age - 0.05741 * $weight + 0.4472 * $heart - 20.4022) * $time / 4.184;
}
"div".$_POST[$cal]
?>