<?php
session_start();

//get the username and password for verification

$_SESSION['user_name'] = $_POST['userName'];
try { 
	    require("dbConnector.php");
	    $db = loadDataBase();
	}
	catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage();
	    die(); 
	}

$query = $db->query("SELECT user_name, password from users
	WHERE user_name = '" . $_POST['userName'] . "' and password = '" . $_POST['password'] . "'");

$numRows = $query->rowCount();

//validate by checking resulting query
if($numRows != 1) 
{
	//username was never found.
    echo "ERROR: invalid username or password, <a href='login.php'>go back</a> and try again.";
    session_destroy();
} 
else 
{
	//if they got here, they're good and need to proceed.
	header('Location: index.php');
	exit;
} 

?>