<?php
session_start();
//redirect if already logged in...
if (isset($_SESSION['user_name'])) {
	header('Location: index.php');
	die();
}

if (isset($_POST['user_name']) && isset($_POST['password']))
{
	//assume that off the bat the login is incorrect, this will be 
	//changed if they password verify says otherwise.
	$badlogin = "set";

	$user = $_POST['user_name'];
	$user = htmlspecialchars($user);

	$pass = $_POST['password'];

	try 
	{
		require("dbConnector.php");
	    $db = loadDataBase();

		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		$query = 'SELECT password FROM users WHERE user_name = :username';

		$statement = $db->prepare($query);
		$statement->bindParam(':username', $user);

		$result = $statement->execute();
			if ($result)
			{
				require("password.php");

				$row = $statement->fetch();
				$hashedPasswordFromDB = $row['password'];

				if (password_verify($pass, $hashedPasswordFromDB))
				{
					//password is good, no longer a bad login...
					unset($badlogin);
					$_SESSION['user_name'] = $user;

					//also, lets get a hold of their cookbook id for the session
					//to make adding any recipes a little easier in the future...
					$anotherStatment = $db->prepare(
						'SELECT cookbook_id FROM cookbook cb
						JOIN users u ON u.user_id = cb.user_id
						WHERE u.user_name = :username');
					
					$anotherStatment->bindParam(':username', $_SESSION['user_name']);
					$retrievedCookbookId = $anotherStatment->execute();

					if($retrievedCookbookId)
					{
						$nudderRow = $anotherStatment->fetch();
						$_SESSION['user_cookbook_id'] = $nudderRow['cookbook_id'];
					}
					else
					{
						$_SESSION['didnt work'] = true;
					}

					header("Location: index.php");
					die();
				}
				else
				{
					//incorrect password...
					$badlogin = "still set";
				}

			}
			else
			{	
				//credentials aren't right...
				$badlogin = "still set";
			}
	} 
	catch (Exception $e) 
	{
		echo "Error: $e";
		die();
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<?php include 'cookBookResources/cbHeaderInfo.php' ?>
	<title>Log in to Books For Cooks</title>
</head>
<body>
<div id="header"><h1>Books For Cooks</h1></div>

<div class="login-block">
	<h1>Please log in to continue</h1>
	<form name="loginForm" action="login.php" method="POST">
  		<input id="username" name="user_name" type="text" placeholder="Username" required/><br />
  		<input id="password" name="password" type="password" placeholder="Password" required/><br />

  		<p class="error_message">
			<?php
			if (isset($badlogin)) { 
				echo "Incorrect Username, or password. please try again.";
			}
			?>
		</p>

		<input type="submit" value="log in">
		<p><a href="create_account.php">Sign up here.</a></p>
	</form>
</div>

</body>
</html>