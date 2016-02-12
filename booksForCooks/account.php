<?php
session_start();

$user = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cookBookResources/cbHeaderInfo.php' ?>
	<title>Books For Cooks</title>
</head>
<body>
<div id="header">
	<h1>Books For Cooks</h1>
</div>
<?php include 'cookBookResources/cbNavigation.php' ?>
<div id="account">
	<h3>My Account</h3>
  <label for="username">Your user name:</label>
  <p id="username"><?echo $user;?></p>

	<form>
  <h6>Edit your user name and password...</h6>
  <label for="oldname">Old Username:</label>
  <input id="oldname" name="oldname" type="text" /> <br />
  <label for="oldpass">Old Password:</label>
  <input id="oldpass" name="oldpass" type="text" /> <br />
  <br />
  <label for="newname">New Username:</label>
  <input id="newname" name="newname" type="text" /> <br />
  <label for="newpass">New Password:</label>
  <input id="newpass" name="newpass" type="text" /> <br />
  <input id="submit" class="btn" name="btnSubmit" type="submit" value="submit" />
</form>
</div>

</body>
</html>