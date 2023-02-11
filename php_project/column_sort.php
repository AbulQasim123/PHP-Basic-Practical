<style>
    th .column_sort{
            text-decoration: none;
            color:  black;
            /* color: white; */
    }
</style>
<?php
    include 'connect.php';
    $output = '';
    $order = $_POST['order'];
    if ($order == 'desc') {
        $order = 'asc';
    }else{
        $order = 'desc';
    }
    $query = "select * from tbl_employee order by ".$_POST["column_name"]." ".$_POST["order"]." ";
    $result = mysqli_query($conn,$query);
    $output.= '<table class="table table-hover table-sm">
                <tr>
                    <th><a href="#" class="column_sort" id="id" data-order="'.$order.'">Id</a></th>
                    <th><a href="#" class="column_sort" id="Name" data-order="'.$order.'">Name</a></th>
                    <th><a href="#" class="column_sort" id="Gender" data-order="'.$order.'">Gender</a></th>
                    <th><a href="#" class="column_sort" id="Designation" data-order="'.$order.'">Designation</a></th>
                </tr>';
    while ($rows= mysqli_fetch_array($result)) {
        $output.='<tr>
                    <td>'.$rows['id'].'</td>
                    <td>'.$rows['Name'].'</td>
                    <td>'.$rows['Gender'].'</td>
                    <td>'.$rows['Designation'].'</td>
        </tr>';
    }
    $output.='</table>';
    echo $output;
?>
