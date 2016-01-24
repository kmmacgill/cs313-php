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
	<?php include 'resources/headerInfo.php' ?>
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
	<?php include 'resources/navigation.php';?>
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
			one called betrayal at the house on the hill. <br /> 
			Originally I came here as an English major luckily it was brother Burton 
			who pursuaded me to come to my senses. I love programming, its always fun 
			for me to create things, and to learn how to make whatever comes to this 
			random head of mine! Hopefully I'll be able to one day say I'm familiar, 
			at least, with most all coding languages. It's a big goal, but a goal of 
			mine nonetheless. I'd love to work for myself in the future or be part of 
			a small company that writes software for other ones. I have an old bishop 
			that is doing that and he loves it. The thing that I love most about my 
			new found passion of programming is that anything is possible. Creating 
			and inventing things are so much fun! <br />
			<img src="images/rambopic.jpg">
			I've been a member of the church all of my life, I served a mission in 
			the England Birmingham Mission. It was something else to learn about 
			the British. It's an entirely different world over there. I would go 
			back if I could afford any day though. I've been back since 2012 and it 
			has been wonderful being back in the states. As I've studied the Gospel 
			and learned more about the world and the Lord's plan for his children I'm 
			continually reminded how awesome and powerful he is and I'm forever 
			grateful for my testimony of the restoration of the gospel. <br />
			Before college, before a mission, I was a guy who loved to party, and I
			thought I was quite good at it too. From blowing things up, getting on
			top of the high school roof, or any other trouble my friends and I could 
			get into, we had quite the repetoire of troublesome things we did. 
			However there was one thing that I was extremely proud of that I did in
			high school. I was in track and field, and I Polevaulted. I had a great 
			time doing it, even went and did it during the off season so I could 
			compete on the college level too. I wasn't half bad, My best I ever did 
			was place 4th in state my junior year. Sadly, I don't polevault anymore, 
			perhaps if BYU Idaho had collegiate sports I would of. But, they don't. 
			<br />

		</div>
</div> <!-- end of wrapper -->

</body>
</html>