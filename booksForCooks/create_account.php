<?php
require ("password.php");

if (isset($_POST['user_name']) && isset($_POST['user_password']))
{
	$user = $_POST['user_name'];
	$user = htmlspecialchars($user);
	
	$pass = $_POST['user_password'];
	$hashword = password_hash($pass, PASSWORD_DEFAULT);

	try {
		require("dbConnector.php");
	    $db = loadDataBase();

		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		$query = 'INSERT INTO users(user_name, password) VALUES(:username, :pass)';

		$statement = $db->prepare($query);
		$statement->bindParam(':username', $user);
		$statement->bindParam(':pass', $hashword);

		$statement->execute();

		$user_id = $db->lastInsertId();

		$stmnt = $db->prepare('INSERT INTO cookbook(user_id) VALUES(:userId)');

		$stmnt->bindParam(':userId', $user_id);
		$stmnt->execute();

		} catch (Exception $e) {
			echo "Error with database: $e";
			die();
		}

		header("Location: login.php");
		die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<?php include 'cookBookResources/cbHeaderInfo.php' ?>
</head>
<body>
	<div id="header"><h1>Books For Cooks</h1></div>
	<div class="login-block">
	<h1>Create an Account</h1>
		<form action="create_account.php" method="POST">
			<input type="text" id="username" name="user_name" placeholder="User Name" required> <br /> <br />
			<input type="text" id="password" name="user_password" placeholder="Password" required> <br /> <br />
			<input type="submit" class="submitbutton" value="Create Account">
		</form>
		<a href="login.php">Cancel</a>
	</div>
</body>
</html>