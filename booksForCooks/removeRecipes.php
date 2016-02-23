<?php
session_start();

$cookbookId = $_SESSION['user_cookbook_id'];

$recipesToDelete = $_POST['deleteBox'];

try 
{ 
    require("dbConnector.php");
    $db = loadDataBase();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    foreach ($recipesToDelete as $recipe)
	{	
		$statement = $db->prepare("DELETE FROM recipe_book 
			WHERE recipe_id = '$recipe' AND cookbook_id = '$cookbookId' ");

		// $statement->bindParam(":recipeId", $recipe);
		// $statement->bindParam(':cookbookId', $cookbookId);

		$statement->execute();
	}
}
catch (PDOException $e) {
	echo 'Error!: ' . $e->getMessage();
    die(); 
}
header("Location: index.php");
die();
?>