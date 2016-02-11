<?php

//redirect if already logged in...
if (isset($_SESSION['logged'])) {
	header('Location: http://localhost/cs313/booksForCooks/index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'cookBookResources/cbHeaderInfo.php' ?>
	<title>Log in to Books For Cooks</title>
</head>
<body>

<div id="header">
	<h1>Welcome to Books For Cooks</h1>
	<h3>Please log in to continue</h3>
	<form action="index.php" method="POST">
		<h6>UserName: <input type='text' name="userName"></h6>
		<h6>Password: <input type="password" name="password"></h6>
		<input type="submit" value="log in">
	</form>
</div>
</body>
</html>