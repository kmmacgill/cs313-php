<?php 
	if($_POST["submit"] == "submitted") {
		setcookie("submitted", "yes");
	}


	$resultFile = fopen("results.txt", "a+") or die("Unable to save results of your survey");
	$que1 = $_POST["Q1"];
	$que2 = $_POST["Q2"];
	$que3 = $_POST["Q3"];
	$que4 = $_POST["Q4"];
	$que5 = $_POST["Q5"];
	$que6 = $_POST["Q6"];
	$que7 = $_POST["Q7"];

	if ($que1 != "" || $que1 != null || $que2 != "" || $que2 != null ||
        $que3 != "" || $que3 != null || $que4 != "" || $que4 != null ||
        $que5 != "" || $que5 != null || $que6 != "" || $que6 != null ||
        $que7 != "" || $que7 != null) {
		fwrite($resultFile, $que1 . "\n");
		fwrite($resultFile, $que2 . "\n");
		fwrite($resultFile, $que3 . "\n");
		fwrite($resultFile, $que4 . "\n");
		fwrite($resultFile, $que5 . "\n");
		fwrite($resultFile, $que6 . "\n");
		fwrite($resultFile, $que7 . "\n");
	}
	fclose($resultFile);
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'hwResources/hwHeaderInfo.php' ?>
	<title>Survey Results</title>
</head>
<body>
<div id="header">
	<h1>Homework assignment 1: Results</h1>
</div>
<div id="wrapper">
	
	<div id="navigation">
		<a href="/./homework.php">Homework Assignments</a> <br />
		<a href="survey.php">Haven't Taken the survey yet?</a>
	</div>

	<div id="main">
		<h3>According to our polls...</h3>
<?php 
	$results = fopen("results.txt", "a+") or die("Unable to open file");
	$fileArray = file("results.txt");
	$wordCount = array_count_values($fileArray);

	foreach($wordCount as $key => $key_value) {
		${$key} = $key;
    	echo "<h3>People who thought " . ${$key} . ": " . $key_value . "</h3> <br />";
}	
	fclose($results);
?>
		
		
	</div>
</div>

</body>
</html>