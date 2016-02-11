<?php
//not sure what goes here.
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
<h2>Let's get Started</h2>

<form>
 
  <label for="name">Recipe Name:</label>
  <input id="name" name="name" type="text" />
  <label for="author">Author:</label>
  <input id="author" name="author" type="text" />
 
  <div id="instructions">
  <p id="add_instruction">
    <a href="#"><span>» Add instruction step.</span></a> <br />
  </div>
 
 <div id="ingredients">
  <p id="add_ingredient">
    <a href="#"><span>» Add ingredient item.</span></a> <br />
  </div>
  <label for="submit">Add Recipe</label>
  <input id="submit" class="btn" name="btnSubmit" type="submit" value="submit" />
</form>

</div>

</body>
</html>