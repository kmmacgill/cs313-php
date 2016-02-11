<?php
session_start();

if (!isset($_SESSION['logged'])) {
	$use = $_POST['userName'];
	$pass = $_POST['password'];
	$_SESSION['logged'] = "yes";
}
//admin info login stuff
$host = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
$port = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$user = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

echo ("The user name is: " + $use + " And the Password is: " + $pass);

//check for blank login
if ($use && $pass) 
{
	try { 
	    $db = new PDO("mysql:host=$host:$port;dbname=booksforcooks", $user, $password);
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
	WHERE u.user_name = '$use'");

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