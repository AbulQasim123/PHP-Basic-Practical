<?php
    session_start();
    if (isset($_POST['submit'])) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['last_login_timestamp'] = time();
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic logout after 15 minutes of user inactivity using php.</title>
    <link rel="stylesheet" href="font-awesome\css\font-awesome.css">
    <style>
        .box{
            width : 600px;
            background-color: gray;
            color: white;
            margin: 0 auto;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="box">
        <h3>login</h3>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Username"><br>
            <input type="text" name="password" id="password" placeholder="Password"><br>
            <input type="submit" value="Submit" name="submit" id="submit">
        </form>
    </div>
    
</body>
</html>