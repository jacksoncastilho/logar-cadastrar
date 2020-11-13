<?php

session_start();

if (!isset($_SESSION['id_user'])) {
    header('location: index.php');
    exit;
}

if (isset($_GET['logout'])) {

    unset($_SESSION['id_user']);
    header('location: index.php');
    exit();
}

?>
<br><br><a href="?logout">Logout</a>