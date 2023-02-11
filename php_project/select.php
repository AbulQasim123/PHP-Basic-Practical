<?php
        // PHP Ajax display dynamic mysql data in bootstrap modal
    include 'connect.php';
    if (isset($_POST['employee_id'])) {
        $output ='';
        $query = "select * from modal_employee where id ='".$_POST["employee_id"]."' ";
        $result = mysqli_query($conn,$query);
        $output.= '<div class="table-responsive"><table class="table table-bordered table-sm">';
        while ($row = mysqli_fetch_assoc($result)) {
            $output.='<tr>
                            <th><label>Name</label></th>
                            <td>'.$row['Name'].'</td>
                        <tr/>
                        <tr>
                            <th><label>Address</label></th>
                            <td>'.$row['Address'].'</td>
                        </tr>
                        <tr>
                            <th><label>Gender</label></th>
                            <td>'.$row['Gender'].'</td>
                        </tr>
                        <tr>
                            <th><label>Designation</label></th>
                            <td>'.$row['Designation'].'</td>
                        </tr>
                        <tr>
                            <th><label>Age</label></th>
                            <td>'.$row['Age'].'</td>
                        </tr>';
        }
        $output.= '</table></div>';
        echo $output;
    }
?>