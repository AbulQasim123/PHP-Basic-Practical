<?php
        // PHP Ajax jquery load dynamic in bootstrap tooltips.
    if (isset($_POST['id'])) {
        include('connect.php');
        $output= '';
        $sql = "select * from modal_employee where id = '".$_POST["id"]."' ";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $output.='<p><img style="width: 150px; height: 150px;" src="Images/'.$row["Images"].' " class="rounded-circle img-thumbnail"></p>
                    <p><label>Name : '.$row['Name'].'<label</p>
                    <p><label>Address : '.$row['Address'].'<label</p>
                    <p><label>Gender : '.$row['Gender'].'<label</p>
                    <p><label>Designation : '.$row['Designation'].'<label</p>
                    <p><label>Age : '.$row['Age'].'<label<p>';
        }
        echo $output;
    }
?>