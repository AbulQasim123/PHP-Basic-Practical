<?php 
    session_start();
    unset($_SESSION['login_name']);
    header('location:index.php');
?>