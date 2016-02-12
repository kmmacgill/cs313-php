<?php
// Not in the openshift environment
//set password for local browsing:
if(!isset($_SESSION['password']))
{
	$_SESSION['password'] = $_POST['password'];
}
$dbHost = "localhost";
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = 'kmac';
$dbPassword = 'password'; 

?>