<?php
session_start();

if (isset($_SESSION['user_name'])) 
{
	try { 
	    require("dbConnector.php");
	    $db = loadDataBase();
	    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage();
	    die(); 
	}
}

if (isset($_POST['recipeList']))
{
	$ingredients = $_POST['recipeList'];

	$ingredient = "";
		$amount = "";
	foreach ($ingredients as $ingr)
	{
		$query = $db->query("SELECT name, amount from ingredients
		WHERE recipe_id = '$ingr'");

		// $ingredient = "";
		// $amount = "";

		while($row = $query->fetch(PDO::FETCH_NUM))
		{
			$ingredient = $ingredient."<tr><td>$row[0]</td></tr>";
			$amount = $amount."<tr><td>$row[1]</td></tr>";
		}
	}
}

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
<div id="shoppingList">
<br />
	<div id="shopList">
		<table id="shopAmt">
		    <tr><th>Amount</th></tr>
		    <tr><?php echo $amount; ?></tr>
		</table>
		<table id="shopName">
		    <tr><th>Ingredient</th></tr>
		    <tr><?php echo $ingredient; ?></tr>
		</table>
	</div>
</div>

</body>
</html>