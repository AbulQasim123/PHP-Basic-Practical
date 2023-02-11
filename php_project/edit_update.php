<?php
        // Convert division tag to editable html form php ajax jquery.
    include 'connect.php';
    $update_query = "update editable_table set Name='".$_POST["name"]."', Gender='".$_POST["gender"]."', Designation='".$_POST["designation"]."' where Id = '".$_POST["emp_id"]."' ";
    mysqli_query($conn,$update_query);
    $select_query = "select * from editable_table where Id= '".$_POST["emp_id"]."'";
    $result_query= mysqli_query($conn,$select_query);
    if (mysqli_num_rows($result_query) > 0) {
        while ($result_rows= mysqli_fetch_array($result_query)) {
            echo "<p><b>Name: </b>". $result_rows['Name']."</p>";
            echo "<p><b>Gender: </b>". $result_rows['Gender']."</p>";
            echo "<p><b>Designation: </b>". $result_rows['Designation']."</p>";
        }
    }else{
        echo "Record Not Found";
    }
?>