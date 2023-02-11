<script src="jquery-ui-1.12.1\external\jquery\jquery-3.6.0.min.js"></script>
<script src="jquery-ui-1.12.1\jquery-ui.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.12.1\jquery-ui.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<?php
?>
<script>
        // Convert division tag to editable html form php ajax jquery.
    $(document).ready(function () {
        $('.division_field').click(function () {
            $('.form_field').show();
            $(this).hide();
        })
        $('#cancil').click(function () {
            $('.form_field').hide();
            $('.division_field').show();
        })
        $('#save').click(function () {
            var emp_name = $('#name').val();
            var emp_designation = $('#designation').val();
            if (emp_name == '' || emp_designation == '') {
                $('#error_msg').html('All field are required.');
            }else{
                $.ajax({
                    url: "edit_update.php",
                    method: "POST",
                    data: $('#submit_form').serialize(),
                    success: function(data){
                        $('.division_field').html(data);
                        $('.form_field').hide();
                        $('.division_field').show();
                    }
                })
            }
        })
    })
        // Export html table to Excel file using jquery with php.
    $(document).ready(function () {
        $('#create_excel').click(function () {
            var excel_data = $('#employee_table').html();
            // console.log(excel_data);
            var page = "excel.php?data="+excel_data;
            window.location = page;
        })
    })
        // Ajax jquery column sort with php and mysql.
    $().ready(function(){
        $(document).on('click', '.column_sort',function(){
            var column_name = $(this).attr('id');
            var order = $(this).data('order');
            // alert(column_name);
            var  arrow= '';
            if (order == 'desc') {
                arrow = '&nbsp; <span class="icon-arrow-down"></span>';
            }else{
                arrow = '&nbsp; <span class="icon-arrow-up"></span>';
            }
            $.ajax({
                url: "column_sort.php",
                method: "POST",
                data: {column_name:column_name,order:order},
                success: function(data){
                    $('#column_sort').html(data);
                    $('#'+column_name+'').append(arrow);
                }
            })
        })
    })
        // PHP Ajax display dynamic mysql data in bootstrap modal
    $().ready(function(){
        $('.view_data').click(function(){
            var employee_id= $(this).attr('id');
            // alert(employee_id);
            $.ajax({
                url: "select.php",
                method: "POST",
                data: {employee_id:employee_id},
                success: function(data){
                    $("#employee_detail").html(data);
                    $('#data_modal').modal('show');
                }
            })
        })
    })
    // Ajax with php mysql data range search using jquery datepicker.
    $(document).ready(function(){
        $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });
        $(function(){
            $('#from_date').datepicker();
            $('#to_date').datepicker();
        })
        $("#filter").click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            // if (from_date =='') {
            //     alert("Please select from date");
            // }else if (to_date == '') {
            //     alert('Please select to date');
            // }else{
            //     $.ajax({
            //         url: "filter.php",
            //         method: "POST",
            //         data: {from_date:from_date,to_date:to_date},
            //         success: function(filter_data){
            //             $('#order_table').html(filter_data);
            //         }
            //     })
            // }
            if (from_date != '' && to_date != '') {
                $.ajax({
                    url: "filter.php",
                    method: "POST",
                    data: {from_date:from_date,to_date:to_date},
                    success: function(filter_data){
                        $('#order_table').html(filter_data);
                    }
                })
            }else{
                alert('Please select date');
            }
        })
    })
        // PHP Ajax jquery load dynamic in bootstrap tooltips.
    $(document).ready(function(){
        $('.hover').tooltip({
            title: fetchdata,
            html: true,
            placement: 'right',
        })
        function fetchdata(){
            var fetch_data = '';
            var element = $(this);
            var id = element.attr('id');
            // console.log(id);
            $.ajax({
                url: 'fetch.php',
                method: 'POST',
                async: false,
                data: {id:id},
                success: function(data){
                    fetch_data = data;
                }
            })
            return fetch_data;
        }
    })

        // PHP Ajax insert data in mysql by using Bootstrap Modal
    $(document).ready(function(){
        $('#insert_form').on('submit',function(event){
            event.preventDefault();
            // alert('hello world');
            let modal_name = "";
            let modal_address = "";
            let modal_gender = "";
            let modal_designation = "";
            let modal_age = "";

            $('.error_field').html("");
            // let is_error = "";

            modal_name = $('#modal_name').val();
            modal_address = $('#modal_address').val();
            modal_gender = $('#modal_gender').val();
            modal_designation = $('#modal_designation').val();
            modal_age = $('#modal_age').val();
            if ((modal_name) == "") {
                $('#modal_name_err').html("Employee name is required ?");
                // is_error = 'yes';
            }else if((modal_address) == ""){
                $('#modal_address_err').html("Employee address is required ?");
                // is_error = 'yes';
            }else if ((modal_gender) == "") {
                $('#modal_gender_err').html('Employee gender is required ?');
                // is_error = 'yes';
            }else if ((modal_designation)== "") {
                $('#modal_designation_err').html("Employee designation is required ?");
                // is_error = 'yes';
            }else if ((modal_age) == "") {
                $('#modal_age_err').html("Employee age is required ?");
                // is_error = 'yes';
            }
            else{
                $.ajax({
                    url: "modal_insert.php",
                    method: "POST",
                    data:$('#insert_form').serialize(),
                    // beforeSend: function(){
                    //     $('#insert').val('Inserting');
                    // },
                    success: function(modal_data){
                        $('#insert_form')[0].reset();
                        $('#add_data_modal').modal('hide');
                        $('#employee_data').html(modal_data);
                        
                    }
                })
            }
        })
    })
    $(document).on('click', '.view_modal', function(){
        let modal_id = $(this).attr('id');
        // console.log(modal_id);
        $.ajax({
            url: "modal_fetch.php",
            method: "POST",
            data: {modal_id: modal_id},
            success: function(modal_result){
                $('#data_detail').html(modal_result);
                $('#modal_detail').modal('show');
            }
        })
    })
</script>