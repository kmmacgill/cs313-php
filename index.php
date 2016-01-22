<?php
//-----------------------SESSION STUFF
session_start();

$VISIT_COUNT = visit;

if (!isset($_SESSION[$VISIT_COUNT]))
{
	$_SESSION[$VISIT_COUNT] = 1;
}
else
{
	$_SESSION[$VISIT_COUNT] += 1;
}
//------------------------------------
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	
	<title>Korey's Homepage</title>
</head>

<body>
<div id="header">
	<h1>Welcome to my homepage</h1>
	<?php 
	echo "<h6>You've visited it " . $_SESSION[$VISIT_COUNT] . " times!</h6>" 
	?>
	</div>
<div id="wrapper">
	<?php include 'navigation.php';?>
	<div id="main">
		<h3>A little about myself...</h3>
    	<div class="more"> 
    		My name is Korey MacGill, I'm a Software Engineering Major. 
			Currently I'm a junior and I'm not exactly sure  when I'll 
			actually be graduating, but hopefully within 4 or 5 semesters.  
			<img src="images/wedding.jpg">
			I've been married for nearly 2 years and I am loving it. I HIGHLY 
			recommend it for everyone. My wife, Holly is a beautiful wonderful 
			smart Biology major who's going in to a physical therapy program at 
			ISU hopefully, we're still waiting to hear back from them. Some of 
			my non-programming hobbies include hiking, camping, hunting, building
			snow caves, and walking dogs (when I have one, hopefully we'll get our own
			soon). I'm also a huge board game fan. Love finding a new game to play
			with family or friends. currently my wife and I are both hooked on this 
			one called betrayal at the house on the hill.<br /> 
			Originally I came here as an English major luckily it was brother Burton 
			who pursuaded me to come to my senses. I love programming, its always fun 
			for me to create things, and to learn how to make whatever comes to this 
			random head of mine! Hopefully I'll be able to one day say I'm familiar, 
			at least, with most all coding languages. It's a big goal, but a goal of 
			mine nonetheless. I'd love to work for myself in the future or be part of 
			a small company that writes software for other ones. I have an old bishop 
			that is doing that and he loves it. The thing that I love most about my 
			new found passion of programming is that anything is possible. Creating 
			and inventing things are so much fun!
			<img src="images/rambopic.jpg">
			I've been a member of the church all of my life, I served a mission in 
			the England Birmingham Mission. It was something else to learn about 
			the British. It's an entirely different world over there. I would go 
			back if I could afford any day though. I've been back since 2012 and it 
			has been wonderful being back in the states. As I've studied the Gospel 
			and learned more about the world and the Lord's plan for his children I'm 
			continually reminded how awesome and powerful he is and I'm forever 
			grateful for my testimony of the restoration of the gospel.
		</div>
</div> <!-- end of wrapper -->

<script type="text/javascript">
$("document").ready(function() {

	$('a.read_more').click(function(event){

		event.preventDefault(); /*don't create new url*/
		$(this).parents('.item').find('.more_text').show(); /*show more text a*/
	});

}) <!-- End of jquery code -->
</script>

</body>
</html>