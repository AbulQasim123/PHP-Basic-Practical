<?php
        // Ajax with php mysql data range search using jquery datepicker.
    if (isset($_POST['from_date'],$_POST['to_date'])) {
        include('connect.php');
        $output = '';
        $query = "SELECT * FROM tbl_order WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ";
                   
        $result = mysqli_query($conn,$query);
        $output.= '<table class="table table-bordered table-sm">
                    <tr class="thead-dark">
                        <th>Id</th>
                        <th>Customer name</th>
                        <th>Item</th>
                        <th>Value</th>
                        <th>Order date</th>
                    </tr>
                    ';
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output.= '<tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['customer_name'].'</td>
                                <td>'.$row['item'].'</td>
                                <td>'.$row['value'].'</td>
                                <td>'.$row['order_date'].'</td>
                            </tr>';
            }
        }else{
            $output.='<tr><td colspan="5">No Order Found.</td></tr>';
        }
        $output.='</table>';
        echo $output;
    }
?>