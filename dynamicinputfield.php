<?php
    include 'connect.php';
        // Dynamically add/remove input field in php with jquery.
    $number= count($_POST['name']);
    if ($number > 1) {
        for ($i=0; $i<$number ; $i++) {
            if(trim($_POST["name"][$i] != '')) {
                $sql = "INSERT INTO dynamicfield(name) VALUES('". $_POST["name"][$i]."')"; 
                mysql_query($sql, $con);
            }
        }
        echo "Data inserted"; 
    }else{
        echo "Please enter name";
    }
?>