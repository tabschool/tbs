<!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">STUDENTS - Add New
        <div class="btn-group">					

</div>	
        </h1>
    </div>
    <!--End Page Header -->
</div>

    
<form role="form" method="post" action="<?php echo current_url() ?>" class="form-horizontal">
  
  <table class="striped responsive-table" style="margin-bottom: 10px;">
                	<thead>
                    	<tr>
                        	<th>Enrollment No.</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="add-new-row">
                    	<tr>
                            <td>
                                <input type="text" class="form-control validate" name="enrollmentno[]" id="enrollmentno" placeholder="Enter Enrollment no." required="">
                                <?php echo form_error('enrollmentno[]'); ?>   
                            </td>
                            <td>
                                <input type="text" class="form-control validate" name="first_name[]" id="first_name" placeholder="Enter First Name" required="">
                                <?php echo form_error('first_name[]'); ?>   
                            </td> 
                            <td>
                                <input type="text" class="form-control validate" name="last_name[]" id="last_name" placeholder="Enter Last Name" required="">
                                <?php echo form_error('last_name[]'); ?>   
                            </td> 
                            <td>
                                <input type="email" class="form-control validate" name="email[]" id="email" placeholder="Enter Email" required="">
                                <?php echo form_error('email[]'); ?>   
                            </td>
                            <td>
                                <input type="tel" class="form-control validate" name="contact[]" id="phone" placeholder="Enter Phone" minlength="10" maxlength="10" required="">
                                <?php echo form_error('contact[]'); ?>   
                            </td> 
                        </tr>
                    </tbody>
                </table>


<a class="btn btn-info" id="add-student-id">Add Students</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                
<!-- end page-wrapper -->

</div>

<script>

  $(document).ready(function (){
        $("#add-student-id").on("click",function (){
        var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="form-control validate" name="enrollmentno[]" id="enrollmentno" placeholder="Enter Enrollment no." required>\n\
                            <div class="error"></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control validate" name="first_name[]" id="first_name" placeholder="Enter First Name" required>\n\
                            <div class="error"></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="form-control validate" name="last_name[]" id="last_name" placeholder="Enter Last Name" required>\n\
                            <div class="error"></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="email" class="form-control validate" name="email[]" id="email" placeholder="Enter Email" required>\n\
                            <div class="error"></div>\n\
                        </td>\n\
\n\                     <td>\n\
                            <input type="tel" class="form-control validate" name="contact[]" id="phone" minlength="10" maxlength="10" placeholder="Enter Phone" required>\n\
                            <div class="error"></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    
    });

</script> 