<?php
session_start();

if (isset($_SESSION['user_name'])) 
{
	try { 
	    require("dbConnector.php");
	    $db = loadDataBase();
	}
	catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage();
	    die(); 
	}

$recipe_id = $_GET["id"];
$mainBook = $_SESSION['mainCookbook'];

//SETTING UP THE INGREDIENTS OF THE RECIPE
$query = $db->query("SELECT ing.name, ing.amount from ingredients ing
join recipe_book rb on ing.recipe_id = rb.recipe_id
join cookbook cb on rb.cookbook_id = cb.cookbook_id
join users u on cb.user_id = u.user_id
WHERE u.user_name = '$mainBook' and ing.recipe_id = '$recipe_id'");

$ingredient = "";
$amount = "";

while($row = $query->fetch(PDO::FETCH_NUM))
{
	$ingredient = $ingredient."<tr><td>$row[0]</td></tr>";
	$amount = $amount."<tr><td>$row[1]</td></tr>";
}

//SETTING UP THE INSTRUCTIONS OF THE RECIPE
$query = $db->query("SELECT stepNumb, message from instructions 
	WHERE recipe_id = '$recipe_id';");

$message = "";

while($row = $query->fetch(PDO::FETCH_NUM))
{
	$message = $message."<tr><td>$row[0]: $row[1]</td></tr>";
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
<div id="main">
<br />
	<div id="instructions">
		<table id="ingAmt">
		    <tr><th>Amount</th></tr>
		    <tr><?php echo $amount; ?></tr>
		</table>
		<table id="ingName">
		    <tr><th>Ingredient</th></tr>
		    <tr><?php echo $ingredient; ?></tr>
		</table>
	</div>
	<div id="ingredients">
		<table id="inst">
		<tr><th>Instructions</th></tr>
		    <tr><?php echo $message; ?></tr>
		</table>
	</div>
</div>

</body>
</html>