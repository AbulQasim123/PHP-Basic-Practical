<?php
    include 'connect.php';
    if (isset($_POST['query'])) {
        $output='';
        $auto_query= "select * from countryname where country_name like '%".$_POST['query']."%' ";
        $auto_result= mysqli_query($con,$auto_query);
        $output.= '<ul class="list-unstyled">';
        if (mysqli_num_rows($auto_result)) {
            while ($auto_row= mysqli_fetch_array($auto_result)) {
                $output.= '<li>'.$auto_row["country_name"].'</li>';
            }
        }else{
            $output.='<li>Country Not Found</li>';
        }
        $output.='</ul>';
        echo $output;
    }
?>