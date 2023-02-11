<?php 
    define("HOST_NAME", "localhost");
    define("USER_NAME", "root");
    define("HOST_PASS", "");
    define("DB_NAME", "php_project");
    $con= mysqli_connect(HOST_NAME,USER_NAME,HOST_PASS,DB_NAME);
    if(!$con){
        echo "connection was successfull";
    }
?>