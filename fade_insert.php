<?php
    include 'connect.php';
    if (isset($_POST['fade_name'])) {
        $name= $_POST['fade_name'];
        $message= $_POST['fade_message'];
        $sql= "insert into tblform_message(`name`,`message`) values('$name','$message')";
        if (mysqli_query($con,$sql)) {
            echo "Message saved";
        }
    }
?>