<?php
    include 'connect.php';
    session_start();
    if (isset($_SESSION['username'])) {
        header('location:dashboard.php');
    }
    if (isset($_POST['register'])) {
        if (empty($_POST['user_name']) && empty($_POST['pass_word'])) {
            echo "<script>alert('Both field are required')</script>";
        }else{
            $user_name = mysql_real_escape_string($_POST['user_name'],$conn);
            $pass_word = mysql_real_escape_string($_POST['pass_word'],$conn);
            $pass_word = md5($pass_word);
            $register_query = "insert into tbl_loginmd5(`login_name`,`login_password`) values('$user_name','$pass_word') ";
            if (mysql_query($register_query,$conn)) {
                echo "<script>alert('Registration done')</script>";
            }

        }   
    }
    if (isset($_POST['login'])) {
        if (empty($_POST['user_name']) && empty($_POST['pass_word'])) {
            echo "<script>alert('Both field are required')</script>";
        }else{
            $user_name = mysql_real_escape_string($_POST['user_name'],$conn);
            $pass_word = mysql_real_escape_string($_POST['pass_word'],$conn);
            $pass_word = md5($pass_word);
            $login_query = "select * from tbl_loginmd5 where `login_name` = '".$user_name."' AND `login_password` = '".$pass_word."' ";
            $result = mysql_query($login_query,$conn);
            if (mysql_num_rows($result) > 0) {
                $_SESSION['username']= $user_name;
                header('location:dashboard.php');
            }else{
                echo "<script>alert('Wrong user detail')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-ui-1.12.1\external\jquery\jquery-3.6.0.min.js"></script>
    <script src="jquery-ui-1.12.1\jquery-ui.min.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1\jquery-ui.min.css">
    <link rel="stylesheet" href="font-awesome\css\font-awesome.css">
    <title>Login page</title>
</head>
<body>
<div class="container-fluid" style="width:600px;">
        <div class="row">
            <div class="">
                            <!-- PHP login registration form with md5 password encryption -->
                <h5 class="font-weight-bold">Php login registration form with md5 password encryption.</h5>
                
                <?php
                    if (isset($_GET["action"]) == 'login') {
                ?>
                <h4 align="center">Login</h4>
                <form action="" method="post">
                    <label for="user_name" style="font-size:18px;">Username</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username">
                    <label for="pass_word" style="font-size:18px;">Password</label>
                    <input type="password" name="pass_word" id="pass_word" class="form-control" placeholder="Password">
                    <input type="submit" value="Submit" class="btn btn-primary my-2" name="login"><br>
                    <p align="center"><a href="login.php">Register</a></p>
                </form>
                <?php 
                    }else{
                ?>
                <h3 align="center">Register</h3>
                <form action="" method="post">
                    <label for="user_name" style="font-size:18px;">Username</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username">
                    <label for="pass_word" style="font-size:18px;">Password</label>
                    <input type="password" name="pass_word" id="pass_word" class="form-control" placeholder="Password">
                    <input type="submit" value="Register" class="btn btn-primary my-2 mx-12" name="register"><br>
                    <p align="center"><a href="login.php?action=login">Login</a></p>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>