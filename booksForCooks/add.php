<?php
session_start();

$cookbookId = $_SESSION['user_cookbook_id'];
$mainBookId = $_SESSION['mainCookbook'];

if (isset($_POST['name']))
{
  $recName = $_POST['name'];
  $recName = htmlspecialchars($recName);
  $recAuth = $_POST['author'];
  $recAuth = htmlspecialchars($recAuth);
  $instructions = $_POST['insFields'];
  //$instructions = htmlspecialchars($instructions);
  $ingredients = $_POST['ingFields'];
  //$ingredients = htmlspecialchars($ingredients);
  $amounts = $_POST['amtFields'];
  //$amounts = htmlspecialchars($amounts);

  try 
  { 
      //set up the PDO object
      require("dbConnector.php");
      $db = loadDataBase();
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

      //add the recipe's name and author to the recipe table.
      $insertIntoRecipes = $db->prepare('INSERT INTO recipes(name, author) VALUES(:name, :author)');
      $insertIntoRecipes->bindParam(':name', $recName);
      $insertIntoRecipes->bindParam(':author', $recAuth);
      $insertIntoRecipes->execute();

      //GRAB THE RECIPE ID! IT IS NEEDED ELSEWHERE!
      $recipeId = $db->lastInsertId();

      //add recipe to the recipe_book table to save recipe as users recipe. 
      $insertIntoRecipe_book = $db->prepare('INSERT INTO recipe_book(recipe_id, cookbook_id) VALUES(:recId, :bookId)');
      $insertIntoRecipe_book->bindParam(':recId', $recipeId);
      $insertIntoRecipe_book->bindParam(':bookId', $cookbookId);
      $insertIntoRecipe_book->execute();

      //GET THE MAIN COOKBOOK_ID!
      $retrievebrowserId = $db->prepare('SELECT user_id FROM users WHERE user_name = "$mainBookId"');
      $result = $retrievebrowserId->execute();



      //in addition, add recipe to mainbook for browsing users.
      $insertIntoMainBook = $db->prepare('INSERT INTO recipe_book(recipe_id, cookbook_id) VALUES(:recId, :bookId)');
      $insertIntoMainBook->bindParam(':recId', $recipeId);
      $insertIntoMainBook->bindParam(':bookId', $result);
      $insertIntoMainBook->execute();

      //insert into instructions table with the new recipe id.
      $stepNumber = 1;
      foreach ($instructions as $inst)
      {
        $insertIntoInstructions = $db->prepare('INSERT INTO instructions(recipe_id, stepNumb, message) VALUES ( :repId, :step, :message)');
        $insertIntoInstructions->bindParam(':repId', $recipeId);
        $insertIntoInstructions->bindParam(':step', $stepNumber);
        //don't forget to increment the stepNumber...
        $insertIntoInstructions->bindParam(':message', $inst);
        $insertIntoInstructions->execute();
        $stepNumber++;
      }

      // foreach( $codes as $index => $code ) {
      //               echo '<option value="' . $code . '">' . $names[$index] . '</option>';
      //           }

      //insert into the ingredients table with same id
      foreach($ingredients as $index => $ingr)
      {
        $insertIntoIngredients = $db->prepare('INSERT INTO ingredients (name, amount, recipe_id) VALUES (:nameOfIng, :numberOfIng, :repIdForIng)');
        $insertIntoIngredients->bindParam(':nameOfIng', $ingr);
        $insertIntoIngredients->bindParam(':numberOfIng', $amounts[$index]);
        $insertIntoIngredients->bindParam(':repIdForIng', $recipeId);
        $insertIntoIngredients->execute();
      }

      //lastly, give the recipe 1 like (from the maker)
      $insertIntoLikes = $db->prepare('INSERT INTO recipe_rating(recipe_id, likes) VALUES(:repId, "1")');
      $insertIntoLikes->bindParam(':repId', $recipeId);
      $insertIntoLikes->execute();
  }
  catch (PDOException $e) {
    echo 'Error!: ' . $e->getMessage();
      die(); 
  }
  //relocate user to their cookbook view to see newly updated recipe in their
  //cookbook.
  header("Location: index.php");
  die();
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
<h2>Let's get Started</h2>

<form action="add.php" method="POST"> 
 
  <label for="name" required>Recipe Name:</label>
  <input id="name" name="name" type="text" />
  <label for="author" required>Author:</label>
  <input id="author" name="author" type="text" />
 
  <div id="instructions">
  <p id="add_instruction">
    <a href="#"><span>Add instruction step.</span></a> <br />
  </div>
 
 <div id="ingredients">
  <p id="add_ingredient">
    <a href="#"><span>Add ingredient item.</span></a> <br />
  </div>

  <label for="submit">Add Recipe</label>
  <input id="submit" class="btn" name="btnSubmit" type="submit" value="submit" />

</form>

</div>

</body>
</html>