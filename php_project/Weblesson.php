<?php   
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "phpproject";  
 $name = '';  
 $gender = '';  
 $designation = '';  
 $employee_id = '';  
 try  
 {  
     $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);  
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
     $statement = $connect->prepare("SELECT * FROM editable_table WHERE id='1'");  
     $statement->execute();  
     foreach($statement as $row)  
     {  
          $employee_id = $row["Id"];  
          $name = $row["Name"];  
          $gender = $row["Gender"];  
          $designation = $row["Designation"];  
     }  
 }  
 catch(PDOException $error)  
 {  
     $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Ajax Jquery - Convert Divison tag to Editable HTML Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="jquery-ui-1.12.1\external\jquery\jquery-3.6.0.min.js"></script>
           <style>  
           .divison_field{  
               padding:16px;  
           }  
           .divison_field:hover{  
               background-color:#f1f1f1;  
               border-radius:5px;  
               padding:16px;  
           }  
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Convert a DIV Area to an Editable HTML Form</h3><br />  
                <form id="submit_form" method="post">  
                     <div class="divison_field">  
                          <p><strong>Name - </strong><?php echo $name; ?></p>  
                          <p><strong>Gender - </strong><?php echo $gender; ?></p>  
                          <p><strong>Designation - </strong><?php echo $designation; ?></p>                                
                     </div>  
                     <div class="form_field" style="display:none;">  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" />  
                          <br />  
                          <label>Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $designation; ?>" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employee_id; ?>" />  
                          <button type="button" name="save" id="save" class="btn btn-info">Save</button>&nbsp;&nbsp;&nbsp;  
                          <button type="button" name="cancel" id="cancel" class="btn btn-cancel">Cancel</button>  
                     </div>  
                </form>  
                <br />                 
           </div>            
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#gender').val("<?php echo $gender; ?>");  
      $('.divison_field').click(function(){  
           $('.form_field').show();  
           $(this).hide();  
      });  
      $('#cancel').click(function(){  
           $('.form_field').hide();  
           $('.divison_field').show();  
      });  
      $('#save').click(function(){  
          var name = $('#name').val();  
          var designation = $('#designation').val();  
          if(name == '' || designation == '')  
          {  
               alert("All Fields are required");  
          }  
          else  
          {  
               $.ajax({  
                    url:"update.php",  
                    method:"POST",  
                    data:$('#submit_form').serialize(),  
                    success:function(data){  
                         $('.divison_field').html(data);  
                         $('.form_field').hide();  
                         $('.divison_field').show();  
                    }  
               })  
          }  
      });  
 });  
 </script>  