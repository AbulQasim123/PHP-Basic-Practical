<?php
    include 'connect.php';
    if (isset($_POST["del_id"])) {
        foreach ($_POST["del_id"] as $id) {
            $query = "DELETE FROM tbl_customer WHERE cust_id = '$id'";
            mysqli_query($con,$query);
        }
    }
    // echo "<script>alert('hello')</script>";
?>