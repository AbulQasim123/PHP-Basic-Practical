<?php
    session_start();
        // How to use ajax with php for login with shake effect.
    if (isset($_SESSION['login_name'])) {
        header('location:home.php');
    }
    
    include 'script.php';
        // How to get multiple checkbox value in php.
    $msg = '';
    if (isset($_POST['submit'])) {
        if (!empty($_POST['lang'])) {
            $msg .= "<span class='text-success'>You have selected following language.</span>";
            foreach ($_POST['lang'] as $language) {
                $msg .='<ul class="text-success">
                    <li>'.$language.'</li>
                </ul>';
            }
        }else{
            $msg .= "<span class='text-danger'>Please select at least one programing language</span>";
        }
    }

        // Append data to json file using php
    $message = '';  
    $error = '';  
    if(isset($_POST["apnd_submit"]))  
    {  
        if(empty($_POST["jsonName"]))  
        {  
            $error = "<label class='text-danger font-weight-bold'>Enter Name</label>";  
        }  
        else if(empty($_POST["jsonGender"]))  
        {  
            $error = "<label class='text-danger font-weight-bold'>Enter Gender</label>";  
        }  
        else if(empty($_POST["jsonDesignation"]))  
        {  
            $error = "<label class='text-danger font-weight-bold'>Enter Designation</label>";  
        }  
        else  
        {  
            if(file_exists('apnd_json.json'))  
            {  
                $current_data = file_get_contents('apnd_json.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                    'name'        => $_POST["jsonName"],  
                    'gender'      => $_POST["jsonGender"],  
                    'designation' => $_POST["jsonDesignation"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data,JSON_PRETTY_PRINT);  
                if(file_put_contents('apnd_json.json', $final_data))  
                {  
                    $message = "<label class='text-success font-italic'>Data Appended Successfully</p>";  
                }  
            }  
            else  
            {  
                $error = 'JSON File not exits';  
            }  
        }  
    }  
    

        // Load record on select box using ajax jquery mysql and php.
    function fill_brand($con){
        $output='';
        $brand_sql= "select * from brand";
        $brand_result= mysqli_query($con, $brand_sql);
        while ($brand_rows= mysqli_fetch_array($brand_result)) {
            $output.= "<option value=".$brand_rows['brand_id'].">".$brand_rows['brand_name']."</option>";
        }
        return $output;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weblesson practical </title>
    <link rel="stylesheet" href="font-awesome\css\font-awesome.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1\jquery-ui.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css">
    <script type="text/javascript" src="jquery-ui-1.12.1\jquery-ui.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\bootstrap.js"></script>
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                    <!-- How to check username availability in php. -->
                <h4>How to check username availability in php Blur (method)</h4>
                <div class="form-group">
                    <h5>Register Page</h5>
                    <label for="username" class="font-weight-bold">username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <span id="availability" class="text-danger"></span> 
                </div>
            </div>
            <div class="col-md-4">
                <h4>How to merge two php json array.</h4>
                <div class="form-group">
                    <?php 
                        $json_array1 = '{
                            "id" : "1",
                            "username" : "John",
                            "type" : "Admin",
                            "status" : "Active"
                        }'; 
                        $json_array2 = '{
                            "id": "2",
                            "username" : "Mike",
                            "type" : "User",
                            "status" : "Inactive"
                        }';
                        echo "<pre>";
                        print_r($json_array1);
                        print_r($json_array2);
                        echo "</pre>";
                        echo "<h4>Merge json</h4>";
                        $user[] = json_decode($json_array1, true);
                        $user[] = json_decode($json_array2, true);
                        $json_merge = json_encode($user);
                        echo "<pre>";
                        print_r($json_merge);
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                        <!-- How to get multiple checkbox value in php. -->
                <h4>How to get multiple checkbox value in php.</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <h5>Please select programing language.</h5>
                        <input type="checkbox" name="lang[]" id="" value="PHP">  PHP <br>
                        <input type="checkbox" name="lang[]" id="" value="ASP">  ASP <br>
                        <input type="checkbox" name="lang[]" id="" value="JSP">  JSP <br>
                        <input type="checkbox" name="lang[]" id="" value="PYTHON">  PYTHON <br>
                        <input type="checkbox" name="lang[]" id="" value="JAVA">  JAVA <br>
                        <input type="submit" class="btn btn-primary" value="submit" name="submit"><br>
                        <div class=""><?php echo $msg; ?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h4>Dynamically add/remove input field in php with jquery.</h4>
                <div class="form-group">
                    <form name="add_form" id="add_form" method="post">
                        <table class="table table-bordered table-sm" id="dynamic_field">
                            <tr>
                                <td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Enter your name"></td>
                                <td><button type="button" class="btn btn-primary" id="add" name="add" >Add more</button></td>
                            </tr>
                        </table>
                        <input type="button" value="Submit" name="submit" id="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <h4>How to use ajax with php for login with shake effect.</h4>
                <div class="login_box" id="login_box">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="user_name" class="font-weight-bold">Username</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username">
                            <span class="error_field text-danger" id="username_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <span class="error_field text-danger" id="password_error"></span>
                        </div>
                        <div class="form-group mx-2">
                            <input type="button" value="Login" name="login" id="login" class="btn btn-primary">
                            <div class="error_field text-danger" id="error_result"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                        <!-- Auto save data using ajax, jquery, php and mysql. -->
                <h4>Auto save data using ajax, jquery, php and mysql.</h4>
                <div class="auto_save">
                    <div class="form-group">
                        <label for="post_title" class="font-weight-bold">Post title</label>
                        <input type="text" name="post_title" id="post_title" class="form-control" placeholder="enter title">
                    </div>
                    <div class="form-group">
                        <label for="post_description" class="font-weight-bold">Post description</label>
                        <textarea name="post_description" id="post_description" rows="3" class="form-control" placeholder="Leave discription"></textarea>
                    </div>
                    <div class="form-group">
                       <input type="hidden" name="post_id" id="post_id">
                       <div class="auto_save" id="auto_save"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5>Use Marquee tag with php and mysql.</h5>
                <?php
                    include 'connect.php';
                    $sql="select * from tbl_vedio order by vedio_id limit 5";
                    $result= mysqli_query($con,$sql);
                ?>
                <div class="marquee" style="border: 1px solid black;">
                    <marquee behavior="scroll" direction="up" onmouseover="this.stop()" onmouseout="this.start()" class="form-control">
                        <?php
                            if (mysqli_num_rows($result)) {
                                while ($rows= mysqli_fetch_assoc($result)) {
                                    echo '<label><a href="'.$rows['vedio_link'].'" target="_blank" title="'.$rows['title'].'">'.$rows['vedio_title'].'</a></label>';
                                }
                            }
                        ?>
                    </marquee>
                </div>
            </div>
            <div class="col-md-6">
                <h5>How to Enter php array with mysql.</h5>
                <?php
                    $array_order= array(
                       "0"=> array("Mobile Phone", "2", "10000"),
                       "1"=> array("Power Bank", "4", "1000"),
                       "2"=> array("Selfi Stick", "6", "1200")
                    );
                //    echo "<pre>";
                //    print_r($array_order[2]);
                    // Repetitive insert command of each row
                    function enter_array($array, $con){
                        // echo "<pre>";
                        // print_r($array[0]);
                        if (is_array($array)) {
                            foreach ($array as $key => $value) {
                                $item_name= mysqli_real_escape_string($con,$value[0]);
                                $item_qty= mysqli_real_escape_string($con,$value[1]);
                                $item_price= mysqli_real_escape_string($con,$value[2]);
                                $query= "insert into tbl_order(`item_name`,`item_qty`,`item_price`) values('$item_name','$item_qty','$item_price')";
                                // if(mysql_query($query,$con)){
                                //     echo '<script>alert("Array insert successfully in Database ")</script>';
                                // }else{
                                //     echo '<script>alert("Something went wrong")</script>';
                                // }
                            }
                        }
                    }
                    enter_array($array_order, $con);
                ?>
                <p class="text-info" style="font-size: 25px;">Code is perfect and work, i give comment, Open code editor and watch and read.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                    <!-- Ajax delete multiple data with checkbox in php, jquery and mysql -->
                <h5>Ajax delete multiple data with checkbox in php, jquery and mysql</h5>
                <?php
                    $sql= "select * from tbl_customer";
                    $result= mysqli_query($con,$sql);
                    if (mysqli_num_rows($result)) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Customer Id</th>
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                            <?php while ($rows= mysqli_fetch_array($result)) { ?>
                            <tr id="<?php echo $rows['cust_id']; ?>">
                                <td><?php echo $rows['cust_id']; ?></td>
                                <td><?php echo $rows['cust_name']; ?></td>
                                <td><?php echo $rows['cust_address']; ?></td>
                                <td align="center"><input type="checkbox" name="cust_id[]" id="cust_id" value="<?php echo $rows['cust_id']; ?>"></td>
                            </tr>
                            <?php } ?>
                    </table>
                    <div align="center">
                        <span id="icon_success" class="text-success display-5 icon-ok" style="display:none;"></span>&nbsp;&nbsp;<span id="success_msg" class="text-success"></span>
                        <span id="icon_error" style="display:none; font-size:22px;" class="text-danger icon-warning-sign"></span><div id="error_msg" class="text-danger font-weight-bold"></div>
                        <button type="button"  name="delete_btn" id="delete_btn" class="btn btn-danger">Delete</button>
                    </div>
                </div>
                <?php }else{
                    echo "<span class='text-danger icon-warning-sign' style='font-size:25px;'> NO record found in database!</span>";
                    echo "<br>";

                    echo '<button type="button" disabled  name="delete_btn" id="delete_btn" class="btn btn-danger">Delete</button>';
                } ?>
                
            </div>
            <div class="col-md-6">
                    <!-- Shorten dynamic comment with jquery php. -->
                <h5>Shorten dynamic comment with jquery php.</h5>
                <div id="box">
                    <h4>Facebook style "Read More"</h4>
                    <?php
                        $tbl_query = "select * from `tbl_comment` order by table_id desc";
                        $comment_result= mysqli_query($con,$tbl_query);
                        while ($rows = mysqli_fetch_assoc($comment_result)) {
                            $comment= mysqli_real_escape_string($con,$rows['table_comment']);
                    ?>
                    <div style="margin-bottom:10px; border:1px solid #ccc; background:#f1f1f1; padding:8px;">
                        <?php
                            echo substr($comment, 0, 100).".";
                            if (strlen($comment) > 100) {
                                echo "<span id='".$rows['table_id']."' style='display:none'>".substr($comment, 100)."</span>&nbsp;&nbsp;";
                                echo "<span class='readmore' data-id='".$rows['table_id']."' style='color:red; cursor:pointer'>Read More</span>";
                            }
                        ?>
                    </div>
                    <?php } ?>
                </div>     
            </div>
        </div>  
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                            <!-- Code is perfect -->
                <h5>Get multiple json data and insert into mysql database in php</h5>
                <?php
                    $query_json= '';
                    $table_json= '';
                    $filename= "employee_data.json";
                    $data= file_get_contents($filename);
                    $array_json= json_decode($data, true);
                    // echo "<pre>";
                    // print_r($array_json);
                    
                    foreach ($array_json as $key => $rows) {
                        // $query_json.= "insert into employee_data(`Name`, `Gender`, `Designation`) VALUES('".$rows["Name"]."', '".$rows["Gender"]."', '".$rows["Designation"]."')";
                            // Data for display on web pages
                        $table_json.= '<tr>
                                <td>'.$rows["Name"].'</td>
                                <td>'.$rows["Gender"].'</td>
                                <td>'.$rows["Designation"].'</td>
                        </tr>';
                        
                    }
                    // if (mysqli_multi_query($query_json,$con)) { // current version not support of this function.
                        echo "<h4>Imported json data.</h4>";
                        echo '<table class="table table-bordered table-sm">
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Designation</th>
                                </tr>';
                        echo $table_json;
                        echo '</table>';
                    // }
                ?>
            </div>
            <div class="col-lg-6">
                        <!-- Append data to json file using php. -->
                <h5>Append data to json file using php.</h5>
                <form action="" method="post">
                    <div class="form-group">
                        <?php
                            if (isset($error)) {
                                echo $error;
                                echo "<br>";
                            }
                        ?>
                        <label for="Name" class="font-weight-bold">Name</label>
                        <input type="text" name="jsonName" id="Name" class="form-control" placeholder="Name">
                        <label for="Gender" class="font-weight-bold">Gender</label>
                        <input type="text" name="jsonGender" id="Gender" class="form-control" placeholder="Gender">
                        <label for="Designation" class="font-weight-bold">Designation</label>
                        <input type="text" name="jsonDesignation" id="Designation" class="form-control" 
                        placeholder="Designation">
                        <input type="submit" value="Append" name="apnd_submit" id="apnd_submit" class="btn btn-primary my-2">
                    </div>
                    <?php
                        if (isset($message)) {
                            echo $message;
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                        <!-- Form submit with fadeout message using jquery ajax and php. -->
                <h5 class="font-weight-bold font-italic">Form submit with fadeout message using jquery ajax and php.</h5>
                <div class="form-group" id="fade_form">
                    <form action="" method="post">
                        <label for="fade_name" class="font-weight-bold">Name</label>
                        <input type="text" name="fade_name" id="fade_name" class="form-control" placeholder="Name">
                        <label for="fade_message" class="font-weight-bold">Message</label>
                        <textarea name="fade_message" id="fade_message" class="form-control" placeholder="Leave a message"></textarea>
                        <input type="button" value="Submit" id="fade_submit" name="fade_submit" class="btn btn-primary my-3"><br>
                        <span id="error_message" class="text-danger font-weight-bold font-italic"></span>
                        <span id="success_message" class="text-success font-italic"></span>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                        <!-- Load record on select box using ajax jquery mysql and php. -->
                <h5 class="font-weight-bold font-italic">Load record on select box using ajax jquery mysql and php.</h5>
                <div class="container">
                    <h4>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">Select Product</option>
                            <?php echo fill_brand($con); ?>
                        </select><br>
                        <div class="row" id="show_product">   
                        </div>
                    </h4>
                    <div id="brand_error" class="text-danger font-italic" style="font-size:19px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                    <!-- Fetch data from two or more table join using php and mysql. -->
                <h5 class="font-weight-bold">Fetch data from two or more table join using php and mysql.</h5>
                <?php
                    $join_sql= "select * from brand inner join product on brand.brand_id = product.brand_id";
                    $join_result = mysqli_query($con,$join_sql);
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <tr class="thead-dark">
                            <th>Brand Name</th>
                            <th>Product Name</th>
                        </tr>
                        <?php
                            if (mysqli_num_rows($join_result) > 0) {
                                while ($join_row= mysqli_fetch_array($join_result)) {
                        ?>
                        <tr>
                            <td><?php echo $join_row['brand_name']; ?></td>
                            <td><?php echo $join_row['product_name']; ?></td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                    <!-- How to load data from json file in php. -->
                <h5 class="font-weight-bold">How to load data from json file in php.</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <tr class="thead-dark">
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Designation</th>
                        </tr>
                        <?php
                            $json_data = file_get_contents('apnd_json.json');
                            $json_data = json_decode($json_data, true);
                            foreach ($json_data as $json_rows) {
                                echo '<tr>
                                        <td>'.$json_rows['name'].'</td>
                                        <td>'.$json_rows['gender'].'</td>
                                        <td>'.$json_rows['designation'].'</td>
                                    </tr>';
                            }
                        ?>    
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <style>
                    ul{
                        background: #eee;
                        cursor: pointer;  
                    }
                    li{
                        padding: 12px;
                    }
                </style>
                    <!-- Ajax automatic textbox using jquery, php and mysql -->
                <h5 class="font-weight-bold" id="auto">Ajax automatic textbox using jquery, php and mysql.</h5>
                <div class="form-group">
                    <label for="country" class="font-weight-bold">Enter Country Name</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="Search Country">
                    <div id="countrylist"></div>
                </div>
                <div>
                    <h5 class="font-weight-bold">How to count of array of specific words from string in php.</h5>
                    <?php
                        $count_array= array("lorem","ipsum","paragraph","category","text");
                        $count_string= "Lorem ipsum, dolor sit amet consectetur adipisicing elit. A non ipsum commodi odit rerum eligendi reiciendis voluptate. In, autem iusto voluptatum vitae, exercitationem dicta repellat nostrum veritatis reiciendis atque ipsa eius molestias dolorum aut quidem cum, minima quo. Facere libero accusamus similique, cum aperiam veritatis nisi rem voluptatem quod neque.";
                        // echo "<p>$count_string</p>";
                        foreach ($count_array as $words) {
                            echo '<b>' ."'$words'".  ' Occurance are ' .substr_count(strtolower($count_string),$words).' times.<br></b>';
                        }
                    ?>
                </div>
                <div>
                    <h5 class="font-weight-bold">How to remove file from computer via php.</h5>
                    <!-- <button type="button" onclick="<?php  // del_images() ?>" class="btn btn-danger btn-sm">Delete Image</button> -->
                    <?php
                        // $del_source = 'D:\ANGULARONE\Image\img_avatar5.png';
                        // if (unlink($del_source)) {
                        //     echo "File Successfully removed";
                        // }else{
                        //     echo "Something went wrong";
                        // }  
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fulid">
        <div class="row">
            <div class="col-lg-3">
                <div>
                    <h5 class="font-weight-bold">Create dynamic json file in php mysql.</h5>
                    <?php
                        function Get_data($con){
                            
                            $json_sql = "SELECT * FROM `tbl_employee` ";
                            $json_result = mysqli_query($con,$json_sql);
                            
                            $employee_data = array();
                            while ($json_rows= mysqli_fetch_array($json_result)) {
                                $employee_data[]= array(
                                    'Id'=> $json_rows['id'],
                                    'Name'=> $json_rows['Name'],
                                    'Gender'=> $json_rows['Gender'],
                                    'Designation'=> $json_rows['Designation']
                                );
                            } 
                            // echo "<pre>";
                            //     print_r(json_encode($sister_data,JSON_PRETTY_PRINT));
                            // echo "</pre>";
                            return json_encode($employee_data,JSON_PRETTY_PRINT);
                        }
                        $file_name = date('d-m-Y').'.json';
                        if (file_put_contents($file_name,Get_data($con))) {
                            echo "<label class='text-success' style='font-size:20px;'>".$file_name." created successfully</label>";
                        }else{
                            echo "<label class='text-danger'>There is an error.</label>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div>
                    <h5>Find the of Days,Hours,Minutes and Seconds between two dates.</h5>
                    <?php
                        $current_date = strtotime("2016-06-30");
                        $old_date = strtotime("2016-06-20");
                        $difference = $current_date - $old_date;
                        echo '<b>Seconds = ' .$difference.' ,</b>' ;
                        echo ' &nbsp;&nbsp;<b>Minutes = ' .floor($difference/60).'</b><br>' ;
                        echo '<b>Hours = ' .floor($difference/60/60).' ,</b>' ;
                        echo ' &nbsp;&nbsp;<b>Days = ' .floor($difference/60/60/24).'</b>' ;
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h5>How to get file extension name in php.</h5>
                <?php
                    function get_file_extension($files_names){
                        return pathinfo($files_names,PATHINFO_BASENAME); // PATHINFO_BASENAME, PATHINFO_DIRNAME
                    }
                    echo '<label style="font-size: 23px" class="font-italic">There is extension file name ' .get_file_extension("C:\xampps\htdocs\PHP-PRACTICAL\Weblesson\index.php").'</label>';
                ?>
            </div>
        </div>
    </div>
    
    
</html>