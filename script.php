<script type="text/javascript" src="jquery-ui-1.12.1\external\jquery\jquery-3.6.0.min.js"></script>
<script>
        // How to check username availability in php
    $(document).ready(function(){
        $('#username').blur(function(){
            // console.log('blur fire');
            var username= $(this).val();
            $.ajax({
                url: "check.php",
                type: "post",
                data: {username: username},
                success: function(result){
                    if (result) {
                        $('#availability').html(result);
                    }else{
                        $('#availability').html(result);
                    }
                }
            })
        })
    })
        // Dynamically add/remove input field in php with jquery.
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $("#dynamic_field").append('<tr id="row'+i+'"><td><input type="text" id="name" name="name[]" class="form-control name_list" placeholder="Enter your name"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></td></tr>');
        })
        $(document).on('click', '.btn_remove', function(){
            var button_id= $(this).attr("id");
            $('#row'+button_id+'').remove();
        })

        $('#submit').click(function(){
            $.ajax({
                url: "dynamicinputfield.php",
                method: "POST",
                data: $('#add_form').serialize(),
                success: function(data){
                    alert(data);
                    $('#add_form')[0].reset();
                }
            })
        })
    })

        // How to use ajax with php for login with shake effect.
    $(document).ready(function(){
        $('#login').click(function(){
            var user_name= $('#user_name').val();
            var password= $('#password').val();
            if ($.trim(user_name).length > 0 && $.trim(password).length > 0) {
                $.ajax({
                    url: "login.php",
                    type: "post",
                    data: {user_name:user_name, password:password},
                    cache: false,
                    beforeSend: function(){
                        $('#login').val('Connecting');
                    },
                    success: function(data){
                        if (data) {
                            $('body').load('home.php').hide().fadeIn(2000);
                            // window.location.href= 'home.php';
                        }else{
                            var options = {
                                distance: '40',
                                direction:'left',
                                times:'3'
                            }
                            $('#user_name').val('');
                            $('#password').val('');
                            $("#login_box").effect("shake", options, 800);
                            $('#login').val("Login");
                            $('#error_result').html("<span class='text-danger'>Invalid username or Password</span>");
                        }
                    }
                })
            }else{
                return false;
            }
        })
    })

        // Auto save data using ajax, jquery, php and mysql.
    $(document).ready(function(){
        function auto_save(){
            var post_title= $('#post_title').val();
            var post_discription= $('#post_description').val();
            var post_id= $('#post_id').val();
            if (post_title !="" && post_discription != "") {
                $.ajax({
                    url: "autosave.php",
                    type: "post",
                    data: {PostTitle:post_title, PostDiscription:post_discription, PostId:post_id},
                    dataType:"text", 
                    suceess: function(data){
                        if(data != ''){  
                            $('#post_id').val(data);  
                        }  
                        $("#auto_save").html('Post save draft');
                        setInterval(() => {
                            $("#auto_save").html('');
                            // $('#post_title').val('');
                            // $('#post_description').val('');
                        }, 2000);
                    }
                })
            }
        }
        setInterval(() => {
            auto_save();
            // $('#post_title').val('');
            // $('#post_description').val('');
        }, 5000);
    })

        // Ajax delete multiple data with checkbox in php, jquery and mysql
    $(document).ready(function(){
        $('#delete_btn').click(function(){
            if (confirm("Are you sure you want to delete this record ?")) {
                var id= [];
                $(':checkbox:checked').each(function(i){
                    id[i] = $(this).val();
                })
                if (id.length === 0) { // Tell you if the array is empty
                    $('#error_msg').html("Please select at least one checkbox.");
                    $('#icon_error').show();
                    // alert("Please select at least one checkbox.");
                    setTimeout(() => {
                        $('#error_msg').html("");
                        $('#icon_error').hide();
                    }, 5000);
                }else{
                    $.ajax({
                        url: "delete_tbl.php",
                        method: "POST",
                        data: {del_id :id},
                        success: function(){
                            for (var i=0; i<id.length; i++) {
                                $('tr#'+id[i]+'').css('background-color', '#ccc');
                                $('tr#'+id[i]+'').fadeOut('slow');
                                $('#success_msg').html('Record delete successfully.');
                                $('#icon_success').show();
                            }
                        }
                    })
                }
            }else{
                return false;
            }
        })
    })
        // Shorten dynamic comment with jquery php.
    $(document).ready(function(){
        $('.readmore').click(function(){
            // alert('done');
            var id = $(this).attr('data-id');
            var text= text= $(this).text();
            if (text == 'Read More') {
                $('#'+id+'').show();
                $(this).text('Less');
            }else{
                $('#'+id+'').hide();
                $(this).text('Read More');
            }
        })
    })
        // Form submit with fadeout message using jquery ajax and php.
    $(document).ready(function(){
        $('#fade_submit').click(function(){
            var fade_name= $('#fade_name').val();
            var fade_message= $('#fade_message').val();
            if (fade_name == '' || fade_message == '') {
                $('#error_message').html("All field are required");
            }else{
                $('#error_message').html('');
                $.ajax({
                    url: "fade_insert.php",
                    method: "POST",
                    data: {fade_name:fade_name, fade_message:fade_message},
                    success: function(data){
                        $('#fade_name').val('');    
                        $('#fade_message').val('');
                        $('#success_message').fadeIn().html(data);
                        setTimeout(() => {
                            $('#success_message').fadeOut('slow');
                        }, 3000);
                    }
                })
            }
        })
    })

    // // Load record on select box using ajax jquery mysql and php.
    $(document).ready(function(){
        $('#brand').change(function(){
            var brand_id = $(this).val();
            if (brand_id != '') {
                $.ajax({
                    url: "load_record.php",
                    method: "POST",
                    data: {brand_id:brand_id},
                    success: function(data){
                        $('#show_product').html(data);
                        $('#brand_error').html('');
                    }
                })
            }else{
                $('#brand_error').html("Please select product name !");
                $('#show_product').html('');
            }
            
        })
    })

        //  Ajax automatic textbox using jquery, php and mysql
    $(document).ready(function(){
        $('#country').keyup(function(){
            // alert('hello');
            var query = $(this).val();
            if (query!= '') {
                $.ajax({
                    url: 'auto_search.php',
                    method: 'POST',
                    data: {query:query},
                    success: function (data) {
                        $('#countrylist').fadeIn();
                        $('#countrylist').html(data);
                    }
                })
            }else{
                $('#countrylist').fadeOut();
                $('#countrylist').html('');
            }
        })
        $(document).on('click','li', function(){
            $('#country').val($(this).text());
            $('#countrylist').fadeOut();
        })
    })
    
</script>