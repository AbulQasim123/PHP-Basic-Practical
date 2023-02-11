<?php
        // Make php hashtag system by using regular expression.
    if (isset($_GET['tag'])) {
        $tag = preg_replace("#[^a-zA-Z0-9_]#",'',$_GET['tag']);
        echo "<h1>".$tag."</h1>";
        include('connect.php');
        $sql = "select * from tbl_blog where blog_title like '%".$_GET['tag']."%' ";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)) {
            while ($row= mysqli_fetch_array($result)) {
                echo '<p style="font-size:18px; font-style:italic; color:darkblue">'.$row['blog_title'].'</p>';
            }
        }else{
            echo "<p>No Data Found.</p>";
        }
    }
?>