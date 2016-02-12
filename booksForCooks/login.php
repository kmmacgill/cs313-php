<?php
session_start();
//redirect if already logged in...
if (isset($_SESSION['user_name'])) {
	header('Location: index.php');
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
	<form name="loginForm" action="verify.php" method="POST">
  		Username: <input id="user" name="userName" type="text" required/>
  		<span id="userError">*</span> <br />
  		Password: <input id="pass" name="password" type="password" required/>
  		<span id="passError">*</span> <br />
		<input type="submit" value="log in">
	</form>
</div>
</body>
</html>