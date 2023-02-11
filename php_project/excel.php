<?php
    // Export html table to Excel file using jquery with php.
    header('Content-type:application/vnd.ms-excel');
    header('Content-disposition:attachment;filename='.rand().'.xls');
    echo $_GET['data'];
?>