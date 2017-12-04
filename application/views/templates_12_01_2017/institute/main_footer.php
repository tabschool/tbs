   <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/metisMenu/jquery.metisMenu.js"></script>
    <script type="text/javascript">

	    $(document).ready(function (){

	        $("#upload").on("change",function (){

	            $("#uploadfile").submit();

	        });

	    });


    $(document).ready(function (){
        $("#add-student-id").on("click",function (){
        var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="form-control" name="enrollmentno[]" id="enrollmentno" placeholder="Enter Enrollment no.">\n\
                            <div class="error"><?php echo form_error("enrollmentno"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control" name="first_name[]" id="first_name" placeholder="Enter First Name">\n\
                            <div class="error"><?php echo form_error("first_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control" name="last_name[]" id="last_name" placeholder="Enter Last Name">\n\
                            <div class="error"><?php echo form_error("last_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="email" class="form-control" name="email[]" id="email" placeholder="Enter Email">\n\
                            <div class="error"><?php echo form_error("email"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="tel" class="form-control" name="contact[]" id="phone" placeholder="Enter Phone">\n\
                            <div class="error"><?php echo form_error("contact"); ?></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    


   $("#add-teacher-id").on("click",function (){
        var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="form-control" name="teacher_unique_id[]" id="teacher_unique_id" placeholder="Enter Teacher Id.">\n\
                            <div class="error"><?php echo form_error("teacher_unique_id"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control" name="first_name[]" id="first_name" placeholder="Enter First Name">\n\
                            <div class="error"><?php echo form_error("first_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control" name="last_name[]" id="last_name" placeholder="Enter Last Name">\n\
                            <div class="error"><?php echo form_error("last_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="email" class="form-control" name="email[]" id="email" placeholder="Enter Email">\n\
                            <div class="error"><?php echo form_error("email"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="tel" class="form-control" name="contact[]" id="phone" placeholder="Enter Phone">\n\
                            <div class="error"><?php echo form_error("contact"); ?></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    
    });
</script>    
	



</body>

</html>
