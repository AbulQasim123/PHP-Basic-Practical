<?php
        //  Load record on select box using ajax jquery mysql and php.
    include 'connect.php';
    $output='';
    if (isset($_POST['brand_id'])) {
        if ($_POST['brand_id'] != '') {
            $sql = "select * from product where `brand_id`= '".$_POST['brand_id']."' ";
        }else{
            $sql= "select * from product";
        }
        $result = mysqli_query($con,$sql);
        while ($row= mysqli_fetch_array($result)) {
            $output.= "<div class='col-md-6'>
                        <div style='border: 1px solid #704080;padding: 10px; margin-bottom:10px'>
                            ".$row['product_name']."
                        </div>
                        </div>";
        }
        echo $output;

    }
?>