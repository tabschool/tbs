<!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">TEACHERS - Add New
        <div class="btn-group">					

</div>	
        </h1>
    </div>
    <!--End Page Header -->
</div>

    
<form role="form" method="post" action="<?php echo current_url() ?>" class="form-horizontal">
  
  <!-- <div class="form-group">
    <label for="teacher_id">Teacher Id</label>
    <input type="text" class="form-control" name="teacher_id" value="<?php echo set_value('teacher_id'); ?>">    
    <?php echo form_error('teacher_id'); ?>   
  </div>
  <div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">    
    <?php echo form_error('first_name'); ?>   
  </div>
    <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo set_value('lastname'); ?>">    
    <?php echo form_error('last_name'); ?>   
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">  
    <?php echo form_error('email'); ?>   
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">  
    <?php echo form_error('email'); ?>   
  </div> -->

  
  <table class="striped responsive-table" style="margin-bottom: 10px;">
                	<thead>
                    	<tr>
                        	<th>Teacher Id.</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="add-new-row">
                    	<tr>
                            <td>
                                <input type="text" class="form-control validate" name="teacher_id[]" id="teacher_id" placeholder="Enter Teacher Id." required="">
                                <?php echo form_error('teacher_id[]'); ?>   
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


<a class="btn btn-info" id="add-teacher-id">Add Teachers</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                
<!-- end page-wrapper -->

</div>

<script>

  $(document).ready(function (){
        $("#add-teacher-id").on("click",function (){
        var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="form-control validate" name="teacher_id[]" id="teacher_id" placeholder="Enter Teacher Id." required>\n\
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