<?php
    session_start();
    include 'connect.php';
    $username= $_POST['user_name'];
    $password= $_POST['password'];
    $sql= "select * from login where username='$username' AND password = '$password' ";
    $result= mysqli_query($con,$sql);
    $num_row= mysqli_num_rows($result);
    if($num_row > 0){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['login_name']= $data['username'];
        echo $data['username'];
    }
    
?>