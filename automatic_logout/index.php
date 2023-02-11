<?php

    session_start();    
    if (isset($_SESSION['name'])) {
        if ((time() - $_SESSION['last_login_timestamp']) >= 60) { // 900 = 15 * 60
            header('location:logout.php');
        }else{
            $_SESSION['last_login_timestamp'] = time();
            echo "<h2 align='center'>".$_SESSION['name']."</h2>";
            echo "<h2 align='center'>".$_SESSION['last_login_timestamp']."</h2>";
            echo "<p align='center'><a href='logout.php'>Logout</a></p>";
        }
    }
    else{
        header('location:login.php');
    }
?>