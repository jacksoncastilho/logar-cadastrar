<?php
require_once 'process.php';

$process_class = new Process();
?>
<!DOCTYPE html>
<html LANG="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleRegister.css">
    <title>Sign Up | Logar-Cadastrar</title>
</head>

<body>
    <div id="form-register">

        <h1>SIGN UP</h1>
        <form method="POST">
            <input type="text" placeholder="Username" name="username" maxlength="50"><br>
            <input type="password" placeholder="Password" name="password" maxlength="32"><br>
            <input type="password" placeholder="Confirm Password" name="confPassword" maxlength="32"><br>
            <input type="submit" value="Submit" name="submit">
            <a href="./login.php"> Já é cadastrado? <strong>SingUp</strong></a>
        </form>
    </div>
    <?php

    $username = addslashes($_POST['username']);  
    $password = addslashes($_POST['password']);
    $confPassword = addslashes($_POST['confPassword']);

    if (isset($_POST['submit'])) {
        
        $process_class->connectDB();
        echo $process_class->msg_error;

        if($password === $confPassword){
            
            if ($process_class->login($username, $password) === true) {
                header("location: site.php");
            } else {
                echo "Incorrect username or password. Try agin! ";
        }
    }
}
    ?>
</body>

</html>