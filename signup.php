<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(strlen($username) == 0) {
        echo 'Please enter a username<br>';
        $error = true;
    }
    if(strlen($firstname) == 0) {
        echo 'Please enter a firstname<br>';
        $error = true;
    }
    if(strlen($lastname) == 0) {
        echo 'Please enter a lastname<br>';
        $error = true;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Please enter a valid email adress<br>';
        $error = true;
    }
    if(strlen($password) == 0) {
        echo 'Please enter a password<br>';
        $error = true;
    }
    if($password != $password2) {
        echo 'Both passwords need to match<br>';
        $error = true;
    }

    // check if the email isn't registered yet
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'This Email is already registered<br>';
            $error = true;
        }
    }

    // if no errors we can register the user
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, password, username, firstname, lastname) VALUES (:email, :password, :username, :firstname, :lastname)");
        $result = $statement->execute(array('email' => $email, 'password' => $password_hash, 'username' => $username, 'firstname' => $firstname, 'lastname' => $lastname));

        if($result) {
            echo 'You have been registered successfully. <a href="login.php">Go to login</a>';
            $showFormular = false;
        } else {
            echo 'There has been an error while saving your data.<br>';
        }
    }
}

if($showFormular) {
?>

<form action="?register=1" method="post">

Username:<br>
<input type="text" size="40" maxlength="250" name="username"><br><br>

Firstname:<br>
<input type="text" size="40" maxlength="250" name="firstname"><br><br>

Lastname:<br>
<input type="text" size="40" maxlength="250" name="lastname"><br><br>

Email:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>

Password:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>

Repeat password:<br>
<input type="password" size="40" maxlength="250" name="password2"><br><br>

<input type="submit" value="Abschicken">
</form>

<?php
} //end of if($showFormular)
?>

<br>
<a href="login.php">Login here!</a>

</body>
</html>
