<?php
session_start();
session_destroy();

echo "Logout succeeded";
?>

<a href="login.php">Back to login</a>
