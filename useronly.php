<?php
session_start();
if(!isset($_SESSION['loggedinusername'])) {
    die('Please <a href="login.php">login</a> first.');
}

// get the username of the logged in person
$loggedinusername = $_SESSION['loggedinusername'];

echo "Hello User: ".$loggedinusername;
?>

<a href="logout.php">logout</a>
