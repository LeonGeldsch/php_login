<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <h1>Test</h1>
            <ul>
                <li><a href="">test1</a></li>
                <li><a href="">test2</a></li>
                <li><a href="">test3</a></li>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<li><a href='profile.php'>Profile Page</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                    } else {
                        echo "<li><a href='signup.php'>Sign up</a></li>";
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="content">