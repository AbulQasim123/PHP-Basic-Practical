<?php 
    include 'connect.php';
        // How to check username availability in php
    $username= $_POST['username'];
    if (isset($username)) {
        $sql = "select * from checkusername where username = '$username' ";
        $result= mysql_query($sql, $con);
        $row = mysql_fetch_assoc($result);
        if (mysql_num_rows($result) > 0) {
            echo '<span class="text-danger">Username not available <b>'. $_POST['username'].'</b> </span>';
        }else{
            echo '<span class="text-success">Username available <b>'. $_POST['username'].'</b> </span>';
        }
    }
?>