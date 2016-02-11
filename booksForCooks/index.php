<?php
session_start();

if (!isset($_SESSION['logged'])) {
//check to see if logged in proper
//do something
//set logged in value good and save username
	$_SESSION['logged'] = "yes";
	$_SESSION['user_name'] = $_POST['userName'];
}

//check for blank login
if (isset($_SESSION['logged'])) 
{
	try { 
	    require("dbConnector.php");
	    $db = loadDataBase();
	}
	catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage();
	    die(); 
	}

	$user = $_SESSION['user_name'];

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
	$dataRow4 = "";

	while($row = $query->fetch(PDO::FETCH_NUM)) {
		$dataRow  = $dataRow."<tr><td><input type='checkbox' name='myTextEditBox' value='checked'/></td></tr>";
	    $dataRow1 = $dataRow1."<tr><td>$row[0]</td></tr>";
	    $dataRow2 = $dataRow2."<tr><td>$row[1]</td></tr>";
	    $dataRow3 = $dataRow3."<tr><td><a href='recipe.php'>Click for Recipe</a></td></tr>";
	    $dataRow4 = $dataRow4."<tr><td><img src='' alt=''</td></tr>";
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
<div id="main">
	<form>
	<input type="submit" value="get shopping list">
		<h1>My Cook Book</h1>
		<table id="add">
	        <tr><th>Add</th></tr>
	        <?php echo $dataRow;?>
	    </table>
		<table id="likes">
	        <tr><th>Likes</th></tr>
	        <?php echo $dataRow1;?>
	    </table>
	    <table id="recipes">
	        <tr><th>Recipe</th></tr>
	        <?php echo $dataRow2;?>
	    </table>
	    <table id="checkOuts">
	        <tr><th>Check out recipe</th></tr>
	        <?php echo $dataRow3;?>
	    </table>
	    <table id="picture">
	        <tr><th>Picture</th></tr>
	        <?php echo $dataRow4;?>
	    </table>
	</form>
</div>

</body>
</html>