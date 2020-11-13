<?php
require_once 'process.php';

$process_class = new Process();
?>
<!DOCTYPE html>
<html LANG="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLogin.css">
    <title>Log In | Logar-Cadastrar</title>
</head>

<body>
    <div id="form-login">

        <h1>LOG IN</h1>
        <form method="POST">
            <input type="text" placeholder="Username" name="username" maxlength="50"><br>
            <input type="password" placeholder="Password" name="password" maxlength="32"><br>
            
            <a class="forgotPassword" href="./index.php"><strong>Forgot my password</strong></a>
            <input type="submit" value="Submit" name="submit">
            <a href="./index.php"> Ainda não é cadastrado? <strong>SingIn</strong></a>
        </form>
    </div>
    <?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['submit'])) {

        $process_class->connectDB();
        echo $process_class->msg_error;

        if ($process_class->login($username, $password) == true) {
            header("location: site.php");
        } else {
            echo "Incorrect username or password. Try agin! ";
        }
    }
    ?>
</body>

</html>