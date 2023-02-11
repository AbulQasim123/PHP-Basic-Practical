<?php
    include 'connect.php';
    if (isset($_POST['PostTitle']) && isset($_POST['PostDiscription'])) {
        $post_title= $_POST['PostTitle'];
        $post_discription= $_POST['PostDiscription'];
        $post_id= $_POST['PostId'];
        if ($post_id !="") {
            // update query
            $sql= "update autosave set post_title= '$post_title' post_discription= '$post_discription' where post_id ='$post_id' ";
            mysql_query($sql,$con);
            
        }else{
            // insert query
            $sql= "insert into autosave (`post_title`,`post_discription`,`post_status`) values('$post_title','$post_discription','Draft')";
            mysql_query($sql,$con);
            echo mysql_insert_id($con);
        }
    }
?>