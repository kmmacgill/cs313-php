<?php
//-----------------------SESSION STUFF
session_start();

$VISIT_COUNT = "visit";

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
<?php
//-----------------------COOKIE STUFF
$cookie_name = "user";
$cookie_value = "Kormac";
setcookie($cookie_name, $cookie_value, time() -5 , "/");
//-----------------------------------
?>
<!DOCTYPE html>
<html>
<head>
	<title>cookie/session practice</title>
</head>
<body>
<?php
	echo "you have visited this site this many times: " . $_SESSION[$VISIT_COUNT] . "<br />";
if(!isset($_COOKIE[$cookie_name])) {
	echo "cookie named : " . $cookie_name . " is not set!<br />";
} else {
	echo "Cookie " . $cookie_name . " is set!<br />";
	echo "Value is: " . $_COOKIE[$cookie_name] . "<br />";
}

print_r($_SESSION);

if ($_SESSION[$VISIT_COUNT] >= 15) {
	session_unset();
}
?>
</body>
</html>