<?php
    if (isset($_POST['modal_id'])) {
        include('connect.php');
        $output = '';
        $fetch_query = "select * from modal_employee where id ='".$_POST['modal_id']."' ";
        $fetch_result = mysqli_query($conn,$fetch_query);
        $output.= '<div class="table-responsive"><table class="table table-bordered table-sm">';
        while ($fetch_row = mysqli_fetch_array($fetch_result)) {
            $output.='<p align="center"><img style="width: 150px; height: 150px;" src="Images/'.$fetch_row["Images"].' " class="rounded-circle img-thumbnail"></p>';
            $output.= '<tr>
                        <th><label>Name</label></th>
                        <td>'.$fetch_row['Name'].'</td>
                    </tr>
                    <tr>
                        <th><label>Address</label></th>
                        <td>'.$fetch_row['Address'].'</td>
                    </tr>
                    <tr>
                        <th><label>Gender</label></th>
                        <td>'.$fetch_row['Gender'].'</td>
                    </tr>
                    <tr>
                        <th><label>Designation</label></th>
                        <td>'.$fetch_row['Designation'].'</td>
                    </tr>
                    <tr>
                        <th><label>Age</label></th>
                        <td>'.$fetch_row['Age'].'</td>
                    </tr>';
        }
        $output.='</table></div>';
        echo $output;
    }
?>