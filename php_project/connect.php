<?php
    $server_name= 'localhost';
    $user_name= 'root';
    $pass_word= '';
    $db_name= 'php_project';

        // Create connection
    $conn = mysqli_connect($server_name,$user_name,$pass_word,$db_name);
    

        // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
    
        // Create database
    /*
        $sql = "create database database_name";
        if (mysql_query($sql,$conn)) {
            echo "database create successfully";
        } else {
            echo "Error creating database: " . mysql_error($conn);
        }

        mysql_close($conn);
    */    
    
?>