<?php
    // Convert or export html text to ms-word with php script.
    $error_msg= '';
    if (isset($_POST['create_word'])) {
        if (empty($_POST['title']) || empty($_POST['description'])) {
            echo '<script>alert("Both field are required")</script>';
            echo '<script>window.location="index.php"</script>';
        }else{
            header("Content-type:application/vnd.ms-word");
            header("Content-Disposition:attachment;filename=".rand()." .doc ");
            header("Pragma:no-cache");
            header("Expires:0");
            echo $_POST['title'];
            echo $_POST['description'];
        }
    }
?>