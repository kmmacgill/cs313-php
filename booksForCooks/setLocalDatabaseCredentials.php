<?php
// Not in the openshift environment
$dbHost = "localhost";
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = $_POST['userName'];
$dbPassword = $_POST['password']; 

?>