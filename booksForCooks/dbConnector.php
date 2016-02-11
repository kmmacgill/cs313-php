<?php

function loadDataBase() 
{
	$dbHost = "";
  	$dbPort = "";
  	$dbUser = "";
  	$dbPassword = "";

    $dbName = "booksforcooks";

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
        // Not in the openshift environment
        // so use local
        require("setLocalDatabaseCredentials.php");
    }
    else 
    { 
        // In the openshift environment
        // Use openshift credentials: ";
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    } 

    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    return $db;
}
?>