<?php

//Initialize the session
session_start();

//Unsett all of the session variables
$_SESSION = array();

//Destroy the session.
session_destroy();

//Redirect to login page
header("location: login.php");
exit;
?>