<!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">TEACHERS - Edit
        <div class="btn-group">					

</div>	
        </h1>
    </div>
    <!--End Page Header -->
</div>

  <?php echo validation_errors(); ?>  
<form role="form" method="post" action="<?php echo current_url() ?>" class="form-horizontal">
  
  <table class="striped responsive-table" style="margin-bottom: 10px;">
                	<thead>
                    	<tr>
                        	<th>Teacher ID.</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="add-new-row">
                    	<tr>
                            <td>
                                <input type="text" class="form-control validate" name="teacher_id" value="<?php if (!empty($teachers->enrollment_number)) echo $teachers->enrollment_number; ?>" id="teacher_id" placeholder="Enter Teacher ID." required="">
                                <?php echo form_error('teacher_id'); ?>   
                            </td>
                            <td>
                                <input type="text" class="form-control validate" name="first_name" value="<?php if (!empty($teachers->first_name)) echo $teachers->first_name; ?>" id="first_name" placeholder="Enter First Name" required="">
                                <?php echo form_error('first_name'); ?>   
                            </td> 
                            <td>
                                <input type="text" class="form-control validate" name="last_name" value="<?php if (!empty($teachers->last_name)) echo $teachers->last_name; ?>" id="last_name" placeholder="Enter Last Name" required="">
                                <?php echo form_error('last_name'); ?>   
                            </td> 
                            <td>
                                <input type="email" class="form-control validate" name="email" value="<?php if (!empty($teachers->email)) echo $teachers->email; ?>" id="email" placeholder="Enter Email" required="">
                                <?php echo form_error('email'); ?>   
                            </td>
                            <td>
                                <input type="tel" class="form-control validate" name="contact" value="<?php if (!empty($teachers->mobile)) echo $teachers->mobile; ?>" id="contact" placeholder="Enter Phone" minlength="10" maxlength="10" required="">
                                <?php echo form_error('contact'); ?>   
                            </td> 
                        </tr>
                    </tbody>
                </table>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                
<!-- end page-wrapper -->

</div>
