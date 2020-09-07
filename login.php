<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();

    // check the password
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['loggedinusername'] = $user['username'];
        die('Login succeeded. Proceed to <a href="useronly.php">internal area</a>');
    } else {
        $errorMessage = "Username or password was wrong<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="?login=1" method="post">
Username:<br>
<input type="text" size="40" maxlength="250" name="username"><br><br>

Password:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>

<input type="submit" value="Abschicken">
</form>
<br>
<a href="signup.php">Sign up here!</a>
</body>
</html>
