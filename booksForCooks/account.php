<?php
// session_start();

// $user = $_SESSION['user'];
// $password = $_SESSION['pass'];

// //check for blank login
// if ($user && $password) {
// 	try { 
// 	    $db = new PDO('mysql:host=localhost;dbname=booksforcooks', $user, $password);
// 		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	}
// 	catch (PDOException $e) {
// 		echo 'Error!: ' . $e->getMessage();
// 	    die(); 
// 	}

// 	//mysql select query
// 	$query = $db->query("SELECT rr.likes, r.name from recipes r 
// 	join recipe_rating rr on r.recipe_id = rr.recipe_id 
// 	join recipe_book rb on rr.recipe_id = rb.recipe_id 
// 	join cookbook cb on rb.cookbook_id = cb.cookbook_id 
// 	join users u on cb.user_id = u.user_id
// 	WHERE u.user_name = '$user'");

// 	$dataRow  = "";
// 	$dataRow1 = "";
// 	$dataRow2 = "";
// 	$dataRow3 = "";
// 	$dataRow4 = "";

// 	while($row = $query->fetch(PDO::FETCH_NUM)) {
// 		$dataRow  = $dataRow."<tr><td><input type='checkbox' name='myTextEditBox' value='checked'/></td></tr>";
// 	    $dataRow1 = $dataRow1."<tr><td>$row[0]</td></tr>";
// 	    $dataRow2 = $dataRow2."<tr><td>$row[1]</td></tr>";
// 	    $dataRow3 = $dataRow3."<tr><td><a href='recipe.php'>Click for Recipe</a></td></tr>";
// 	    $dataRow4 = $dataRow4."<tr><td><img src='' alt=''</td></tr>";
// 	}

// 	}
// 	else
// 		die("Whoops, looks like you didn't enter a user name or password <br />
// 			Better fix that, " . "<a href='login.php'>go back</a>" . " and try again.");
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
<?php include 'cookBookResources/cbUser.php' ?>
<div id="account">
	<h1>My Account</h1>
	<form>
 
  <label for="oldname">Old Username:</label>
  <input id="oldname" name="oldname" type="text" /> <br />
  <label for="oldpass">Old Password:</label>
  <input id="oldpass" name="oldpass" type="text" /> <br />
  <label for="newname">New Username:</label>
  <input id="newname" name="newname" type="text" /> <br />
  <label for="newpass">New Password:</label>
  <input id="newpass" name="newpass" type="text" /> <br />
  <input id="submit" class="btn" name="btnSubmit" type="submit" value="submit" />
</form>
</div>

</body>
</html>