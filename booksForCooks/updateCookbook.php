<?php
session_start();

$cookbookId = $_SESSION['user_cookbook_id'];

$recipesToAdd = $_POST['addToCookbook'];

try 
{ 
    require("dbConnector.php");
    $db = loadDataBase();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    foreach ($recipesToAdd as $recipe)
	{

		$checkforDups = $db->query('SELECT COUNT(*) FROM recipe_book WHERE recipe_id = "$recipe" AND cookbook_id = "$cookbookId"');
		$result = $checkforDups->fetchColumn();

		if ($result > 0) // it's not already in the cookbook...
		{echo "DIDn'T PASS!!!!"; die();}
		else
		{
			$statement = $db->prepare('INSERT INTO recipe_book(recipe_id, cookbook_id) VALUES (:recipeId, :cookbookId)');
			$statement->bindParam(':recipeId', $recipe);
			$statement->bindParam(':cookbookId', $cookbookId);
			$statement->execute();
		}
	}
}
catch (PDOException $e) {
	echo 'Error!: ' . $e->getMessage();
    die(); 
}

header("Location: index.php");
die();

?>