<?php
session_start();

$user = $_SESSION['user'];
$password = $_SESSION['pass'];

//check for blank login
if ($user && $password) {
	try { 
	    $db = new PDO('mysql:host=localhost;dbname=booksforcooks', $user, $password);
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage();
	    die(); 
	}

	//mysql select query
	$query = $db->query("SELECT rr.likes, r.name from recipes r 
	join recipe_rating rr on r.recipe_id = rr.recipe_id 
	join recipe_book rb on rr.recipe_id = rb.recipe_id 
	join cookbook cb on rb.cookbook_id = cb.cookbook_id 
	join users u on cb.user_id = u.user_id
	WHERE u.user_name = '$user'");

	$dataRow  = "";
	$dataRow1 = "";
	$dataRow2 = "";
	$dataRow3 = "";

	while($row = $query->fetch(PDO::FETCH_NUM)) {
		$dataRow  = $dataRow."<tr><td><input type='checkbox' name='myTextEditBox' value='checked'/></td></tr>";
	    $dataRow1 = $dataRow1."<tr><td>$row[0]</td></tr>";
	    $dataRow2 = $dataRow2."<tr><td>$row[1]</td></tr>";
	    $dataRow3 = $dataRow3."<tr><td><a href='recipe.php'>Click to Edit</a></td></tr>";
	}

	}
	else
		die("Whoops, looks like you didn't enter a user name or password <br />
			Better fix that, " . "<a href='login.php'>go back</a>" . " and try again.");
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
<div id="main">
	<form>
	<input type="submit" value="confirm deletions">
	<h1>My Cook Book</h1>
	<table id="remove">
        <tr><th>Delete</th></tr>
        <?php echo $dataRow;?>
    </table>
    <table id="recipes">
        <tr><th>Recipe</th></tr>
        <?php echo $dataRow2;?>
    </table>
    <table id="edits">
        <tr><th>Edit Recipe</th></tr>
        <?php echo $dataRow3;?>
    </table>
    </form>
</div>

</body>
</html>