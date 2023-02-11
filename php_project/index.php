<?php
    include 'script.php';
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-ui-1.12.1\external\jquery\jquery-3.6.0.min.js"></script>
    <script src="jquery-ui-1.12.1\jquery-ui.min.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1\jquery-ui.min.css">
    <link rel="stylesheet" href="font-awesome\css\font-awesome.css">
    <title>Project</title>
    <style>
        .division_field{
            padding: 16px;
            cursor: pointer;
            border: 1px solid black;
        }
        .division_field:hover{
            background: #f1f1f1;
            border-radius: 5px; 
            padding: 16px;
        }
        th .column_sort{
            text-decoration: none;
            color:  black;
            /* color: white; */
        }
        .error_field{
            color: red;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Convert division tag to editable html form php ajax jquery. -->
                <h5>Convert division tag to editable html form php ajax jquery.</h5>
                <?php
                    $emp_name = '';  
                    $emp_gender = '';  
                    $emp_designation = '';  
                    $emp_id = '';  
                    $error_msg ='';
                    $query = "SELECT * FROM editable_table where Id = 2 ";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows= mysqli_fetch_array($result)) {
                            $emp_id= $rows['Id'];
                            $emp_name= $rows['Name'];
                            $emp_gender= $rows['Gender'];
                            $emp_designation= $rows['Designation'];
                        }
                    }else{
                        $error_msg = "Record Not Found";
                    }
                ?>
                <form action="" method="post" id="submit_form">
                    <div class="division_field">
                        <p><b>Name:</b> <?php echo $emp_name; ?></p>
                        <p><b>Gender:</b> <?php echo $emp_gender; ?></p>
                        <p><b>Designation:</b> <?php echo $emp_designation; ?></p>
                    </div>
                    <div id="error_msg" class="text-danger font-italic"><?php echo $error_msg; ?></div>
                    <div class="form_field" style="display:none;">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $emp_name?>">
                        <label for="gender" class="font-weight-bold">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="designation" class="font-weight-bold">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control my-2" value="<?php echo $emp_designation?>">
                        <input type="hidden" name="emp_id" id="emp_id" class="form-control" value="<?php echo $emp_id ?>">
                        <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                        <button type="button" name="cancil" id="cancil" class="btn btn-danger">Cancil</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                    <!-- Convert or export html text to ms-word with php script. -->
                <h5>Convert or export html text to ms-word with php script.</h5>
                <div class="export_html">
                    <form action="export.php" method="post">
                        <label for="title" class="font-weight-bold">Enter title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
                        <label for="description" class="font-weight-bold">Enter description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter discription"></textarea>
                        <input type="submit" id="create_word" name="create_word" class="btn btn-info my-2" value="Export to Ms word">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                    <!-- Export html table to Excel file using jquery with php. -->
                <h5 class="font-weight-bold">Export html table to Excel file using jquery with php.</h5>
                <?php
                    include 'connect.php';
                    $query = "select * from tbl_employee where id limit 10";
                    $result = mysqli_query($conn,$query);
                ?>
                <div id="employee_table">
                    <table class="table table-striped table-sm" id="">
                        <tr class="thead-dark">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Designation</th>
                        </tr>
                        <?php
                            while ($rows= mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['Name']; ?></td>
                            <td><?php echo $rows['Gender']; ?></td>
                            <td><?php echo $rows['Designation']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <button type="button" id="create_excel" name="create_excel" class="btn btn-success">Create excel file</button>
            </div>
            <div class="col-lg-6">
                        <!-- Ajax jquery column sort with php and mysql. -->
                <h5 class="font-weight-bold">Ajax jquery column sort with php and mysql.</h5>
                <?php
                    $sql = "select * from tbl_employee order by id desc";
                    $result= mysqli_query($conn,$sql);
                ?>
                <div id="column_sort" class="table-responsive">
                    <table class="table table-hover table-sm">
                        <tr class="">
                            <th><a href="#" class="column_sort" id="id" data-order="desc">Id</a></th>
                            <th><a href="#" class="column_sort" id="Name" data-order="desc">Name</a></th>
                            <th><a href="#" class="column_sort" id="Gender" data-order="desc">Gender</a></th>
                            <th><a href="#" class="column_sort" id="Designation" data-order="desc">Designation</a></th>
                        </tr>
                        <?php 
                            while ($row= mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Gender'] ?></td>
                            <td><?php echo $row['Designation'] ?></td>
                        </tr>
                        <?php    } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Make php hashtag system by using regular expression. -->
                <h5 class="font-weight-bold">Make php Hashtag system by using regular expression.</h5>
                <?php
                    function converthashtolink($stings){
                        $expression = "/#+([a-zA-Z0-9_]+)/";
                        $stings= preg_replace($expression,'<a href="hashtag.php?tag=$1">$0</a>',$stings);
                        return $stings;
                    }
                    $stings = array('1' => "#PHP mean hypertext preprocessor",'2' => "#MYSQL is nice database",'3' =>"#JQUERY is a javascript framework","#AbulQasim is a web developer");
                    // $stings = ["#PHP mean hypertext preprocessor","#MYSQL is nice database","#JQUERY is a javascript framework"];
                    // $stings= "#PHP mean hypertext preprocessor";
                    // $stings= "#MYSQL is nice database";
                    // $stings= "#JQUERY is a javascript framework";
                    $stings = converthashtolink($stings);
                    // echo $stings;
                    echo '<pre>';
                        print_r($stings);
                    echo '<pre>';
                ?>
            </div>
            <div class="col-lg-6">
                <!-- PHP Ajax display dynamic mysql data in bootstrap modal -->
                <h5 class="font-weight-bold">PHP Ajax display dynamic mysql data in bootstrap modal.</h5>
                <?php
                    $modal_sql = "select * from modal_employee";
                    $modal_result = mysqli_query($conn,$modal_sql);
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <tr>
                            <th>Employee Name</th>
                            <th>View</th>
                        </tr>
                        <?php
                            while ($modal_row = mysqli_fetch_array($modal_result)) {
                        ?>
                        <tr>
                            <td><?php echo $modal_row['Name']; ?></td>
                            <td><input type="button" name="view" value="View" id="<?php echo $modal_row['id'] ?>" class="btn btn-primary btn-sm view_data"></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div id="data_modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Employee Detail</h4>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&times;</button>
                            </div>
                            <div id="employee_detail" class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Ajax with php mysql data range search using jquery datepicker -->
        <h5 class="font-weight-bold">Ajax with php mysql data range search using jquery datepicker.</h5>
        <h3>Order data</h3>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From date">
            </div>
            <div class="col-md-3">
                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To date">
            </div>
            <div class="col-md-5">
                <input type="button" value="Filter" name="filter" id="filter" class="btn btn-primary">
            </div>
            
            <?php
                $filter_query = "select * from tbl_order order by id desc";
                $filter_result = mysqli_query($conn,$filter_query);
            ?>
            <div id="order_table" class="table-responsive my-2">
                <table class="table table-bordered table-sm">
                    <tr class="thead-dark">
                        <th>Id</th>
                        <th>Customer name</th>
                        <th>Item</th>
                        <th>Value</th>
                        <th>Order date</th>
                    </tr>
                    <?php
                        while ($filter_row= mysqli_fetch_assoc($filter_result)) {
                    ?>
                    <tr>
                        <td><?php echo $filter_row['id']; ?></td>
                        <td><?php echo $filter_row['customer_name']; ?></td>
                        <td><?php echo $filter_row['item']; ?></td>
                        <td><?php echo $filter_row['value']; ?></td>
                        <td><?php echo $filter_row['order_date']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- PHP Ajax jquery load dynamic in bootstrap tooltips. -->
        <h5>PHP Ajax jquery load dynamic in bootstrap tooltips.</h5>
        <h3>Employee Data</h3>
        <div class="row">
            <div class="col-lg-6">
                <?php
                    $tool_query = "select * from modal_employee order by id asc";
                    $tool_result = mysqli_query($conn,$tool_query);
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <tr class="thead-dark">
                            <th>ID</th>
                            <th>Employee Name</th>
                        </tr>
                        <?php
                            while ($tool_row = mysqli_fetch_assoc($tool_result)) {
                        ?>
                        <tr>
                            <td><?php echo $tool_row['id'] ?></td>
                            <td><label><a href="#" class="hover" id="<?php echo $tool_row['id'] ?>"><?php echo $tool_row['Name'] ?></a></label></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                    <!-- How to make alphabetic pagination in php with mysql. -->
                <h5>How to make alphabetic pagination in php with mysql.</h5>
                <div class="table-responsive">
                    <h4>Student data</h4>
                    <?php
                        $char = '';
                        if (isset($_GET['character'])) {
                            $char = $_GET['character'];
                            $char = preg_replace('#[^a-z]#i','', $char);
                            $alpha_query = "select * from tbl_alphabetic where student_name like '$char%' ";
                        }else{
                            $alpha_query = "select * from tbl_alphabetic order by student_id";
                        }
                        // $alpha_query = "select * from tbl_alphabetic order by student_id";
                        $alpha_result= mysqli_query($conn,$alpha_query);
                        $character = range('A','Z');
                        echo "<ul class='pagination'>";
                        foreach ($character as $alphabet) {
                            echo '<li class="page-item"><a class="page-link" href="index.php?character='.$alphabet.'">'.$alphabet.'</a></li>';
                        }
                        echo "</ul>";
                    ?>
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                        </tr>
                        <?php
                            if (mysqli_num_rows($alpha_result) > 0) {
                                while ($alpha_row = mysqli_fetch_assoc($alpha_result)) {
                            
                        ?>
                        <tr>
                            <td><?php echo $alpha_row['student_id']; ?></td>
                            <td><?php echo $alpha_row['student_name']; ?></td>
                            <td><?php echo $alpha_row['student_phone']; ?></td>
                        </tr>
                        <?php
                                }
                            }else{
                        ?>
                            <tr><td colspan="3" align="center" class="font-weight-bold">Data Not Found.</td></tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
                <!-- PHP Ajax insert data in mysql by using Bootstrap Modal -->
                <h5><q>PHP Ajax insert data in mysql by using Bootstrap Modal</q></h5>
        <div class="row">
            <div class="col-lg-6">
                <h4>Insert data through Bootstrap Modal</h4>
                <div class="table-responsive">
                    <div align="right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_data_modal">Add</button>
                    </div>
                    <?php
                        $modal_sql = "select * from modal_employee order by Id asc";
                        $modal_result = mysqli_query($conn,$modal_sql);
                    ?>
                    <div id="employee_data" class="my-2">
                        <table class="table table-striped table-hover table-sm">
                            <tr class="thead-dark text-center">
                                <th>Employee Name</th>
                                <th>View</th>
                            </tr>
                            <?php
                                while ($modal_row = mysqli_fetch_array($modal_result)) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $modal_row['Name']; ?></td>
                                <td><input type="button" value="View" name="view" id="<?php echo $modal_row["id"]?>" class="btn btn-info btn-sm view_modal"></td>
                            </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div id="add_data_modal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Insert data through modal</h4>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="insert_form">
                                    <div class="form-group">
                                        <label for="modal_name" class="">Enter employee name*</label>
                                        <div id="modal_name_err" class="error_field"></div>
                                        <input type="text" name="modal_name" id="modal_name" class="form-control" placeholder="Employee name">
                                    </div>
                                    <div class="form-group">
                                        <label for="modal_address" class="">Enter employee address*</label>
                                        <div id="modal_address_err" class="error_field"></div>
                                        <input type="text" name="modal_address" id="modal_address" class="form-control" placeholder="Employee address">
                                    </div>
                                    <div class="form-group">
                                        <label for="modal_gender" class="">Select employee gender*</label>
                                        <div id="modal_gender_err" class="error_field"></div>
                                        <select name="modal_gender" id="modal_gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">  
                                        <label for="modal_designation" class="">Enter employee designation*</label>
                                        <div id="modal_designation_err" class="error_field"></div>
                                        <input type="text" name="modal_designation" id="modal_designation" class="form-control" placeholder="Employee designation">
                                    </div>
                                    <div class="form-group">
                                        <label for="modal_age" class="">Enter employee age*</label>
                                        <div id="modal_age_err" class="error_field"></div>
                                        <input type="text" name="modal_age" id="modal_age" class="form-control" placeholder="Employee age">
                                    </div>
                                    <div align="center" class="form-group my-2">
                                        <input type="submit" value="Insert" name="insert" id="insert" class="btn btn-primary btn-sm">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_detail" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Employee detail</h4>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">&times;</button>
                            </div>
                            <div class="modal-body" id="data_detail"></div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            // Convert division tag to editable html form php ajax jquery.
        $(document).ready(function(){ 
            $('#gender').val("<?php echo $emp_gender; ?>");
        });
    </script>
    <?php  ?>
</body>
</html>