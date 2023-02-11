<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include('connect.php');
        if (!empty($_POST)) {
            $output = '';
            $modal_name = mysql_real_escape_string($_POST['modal_name'],$conn);
            $modal_address = mysql_real_escape_string($_POST['modal_address'],$conn);
            $modal_gender = mysql_real_escape_string($_POST['modal_gender'],$conn);
            $modal_designation = mysql_real_escape_string($_POST['modal_designation'],$conn);
            $modal_age = mysql_real_escape_string($_POST['modal_age'],$conn);

            $insert_query = "insert into tbl_tooltip(`Name`,`Address`,`Gender`,`Designation`,`Age`) value('$modal_name','$modal_address','$modal_gender','$modal_designation','$modal_age')";
            if (mysql_query($insert_query,$conn)) {
                $output.= '<div class="alert alert-success"><b>Data inserted.</b><button class="close" data-dismiss="alert">&times;</button></div>';

                $select_query = "select * from tbl_tooltip order by Id desc";
                $select_result = mysql_query($select_query,$conn);
                $output.= '<table class="table table-striped table-hover table-sm">
                    <tr class="thead-dark text-center">
                        <th>Employee Name</th>
                        <th>View</th>
                    </tr>';
                    while ($select_row = mysql_fetch_array($select_result)) {
                        $output.='<tr class="text-center">
                            <td>' .$select_row["Name"]. '</td>
                            <td><input type="button" value="View" name="view" id="' .$select_row["Id"]. '" class="btn btn-info btn-sm view_modal"></td>
                        </tr>';
                
                    }
                $output.="</table>";
            }
            echo $output;
        }
    }
?>
