<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['login_name'])) {
            header('location:index.php');
        }
        echo '<h1 align="center" style="color: green;"> Welcome to home page <q>'.$_SESSION["login_name"]. '</q></h1>';
        echo '<p align="center" style="font-size: 30px;">
            <a href="logout.php">Logout</a>
        </p>';
    ?>
</body>
</html>