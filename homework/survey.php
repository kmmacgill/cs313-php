<?php
if ($_COOKIE["submitted"] == "yes"){
    header('Location: http://php-kormac.rhcloud.com/homework/results.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'hwResources/hwHeaderInfo.php' ?>
	<title>Survey assignment</title>
</head>
<body>

	<div id="header">
		<h1>Homework assignment 1: Survey</h1>
	</div>

	<div id="wrapper">
		<div id="navigation">
		<a href="/./homework.php">Homework Assignments</a> <br />
		<a href="results.php">Check Results</a>
		</div>

		<form id="main" name="surveyForm" action="results.php" onsubmit="return validateForm()" method="post">
			<div id="questionCenter">
				<h3>Question 1</h3>
				<p>Who would win in a fight?</p> 
				<img src="hwImages/superman_vs_hulk.png"> <br />
				<input type="radio" id="Q1" name="Q1" value="Hulk would win" /> Hulk
				<input type="radio" id="Q1" name="Q1" value="Superman would win" /> Superman	
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 2</h3>
				<p>Would you rather have...</p>
				<input type="radio" id="Q2" name="Q2" value="Super Powers are better" />Superpowers <br />
				<img src="hwImages/powers.jpg"> <br />
				<input type="radio" id="Q2" name="Q2" value="Gadgets are better" />Gadgets <br />
				<img src="hwImages/bigHero6.png">
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 3</h3>
					<label id="labelLeft">
	   					<input id="Q3" type="radio" name="Q3" value="Guardians Of The Galaxy is the better movie" />
	    				<img src="hwImages/GOTG-poster.jpg">
	  				</label>
	  				<label id="labelRight">
	   					<input id="Q3" type="radio" name="Q3" value="The Avengers is the better movie" />
	    				<img src="hwImages/TheAvengers2012Poster.jpg">
	  				</label>
	  			<br />
				<br />
				<br />
				<br />
				<br />
				<br />
	  			<p>Which movie is better?</p>
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 4</h3>
				<p>Pick a color.</p>
				<input type="radio" id="Q4" name="Q4" value="to choose Blue" />blue<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Red" />red<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Yellow" />yellow<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Orange" />orange<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Pink" />pink<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Purple" />purple<br />
				<input type="radio" id="Q4" name="Q4" value="to choose Green" />green<br />
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 5</h3>
				<p>what reality would you rather live in?</p> 
				<label id="labelLeft">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of The Lord Of The Rings" />
	    			<img src="hwImages/lotr.jpg">
	  			</label>
	  			<label id="labelCenter">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of Star Wars" />
	    			<img src="hwImages/starWars.jpg">
	  			</label>
	  			<label id="labelRight">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of Xmen" />
	    			<img src="hwImages/xmen.jpg">
	  			</label> 
	  			<br />
	  			<label id="labelLeft">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of Clash Of The Titans" />
	    			<img src="hwImages/titans.jpg">
	  			</label>
	  			<label id="labelCenter">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of Harry Potter" />
	    			<img src="hwImages/harryPotter.jpg">
	  			</label>
	  			<label id="labelRight">
	   				<input id="Q5" type="radio" name="Q5" value="life would be better in the world of Transformers" />
	    			<img src="hwImages/transformers.jpg">
	  			</label> 
	  			<br />	
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 6</h3>
				<p>
					If you were stranded on a desert island, and <br />
					could only bring one person with you. <br />
					Who would you bring?
				</p>
				<input type="radio" id="Q6" name="Q6" value="they'd bring Mom on the island" />Your mother<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring Dad on the island" />Your Father<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring their Pet on the island" />Your trusty pet<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring Sibling on the island" />Your sibling<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring Friend on the island" />Your friend<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring their Significant other on the island" />Your Man/Woman<br />
				<input type="radio" id="Q6" name="Q6" value="they'd bring Bear Grylls on the island" />Bear Grylls<br />
			</div>
			<br />
			<div id="questionCenter">
				<h3>Question 7</h3>
				<p>Did you enjoy this survey?</p>
				<input type="radio" id="Q7" name="Q7" value="this Survey is awesome!">Yes<br />
				<input type="radio" id="Q7" name="Q7" value="this Survey wasn't that awesome...">No<br />
			</div>
			<br />
			<div id="questionCenter">
				<h3>Thanks for taking the survey!</h3>
				<p>Don't forget to submit your results</p>
				<button type="submit" name="submit" value="submitted">Submit</button>
				<input type="reset" value="reset">
			</div>
		</form>
</div> <!-- end of wrapper -->

</body>
</html>