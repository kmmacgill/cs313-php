<!DOCTYPE html>
<html>
<head>
	<title>php practice with files</title>
</head>
<body>
<?php
	$myfile = fopen("testFile.txt", "a") or die("Unable to open file!");
	$txt = "going to see if this overwrites the current text in the file or not\n";
	fwrite($myfile, $txt);
	fclose($myfile);

	$resultFile = fopen("testFile.txt", "r") or die("Unable to open file!");
	echo fread($resultFile, filesize("testFile.txt"));
	fclose($resultFile);
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>