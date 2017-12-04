	
    <div class="container">       
        <div class="row">           
      <div class="col-md-5 col-md-offset-4">
                <div class="login-panel panel panel-default">                     

                <div class="panel-body ">
					<h3>Yay! Let's Go!</h3>
					<p>Fill out the Academic Details </p>
                        <form  action="" method="post" enctype="multipart/form-data">
                         <fieldset>
							<div class="form-group">
                                     <input type="hidden" name="institute_id" id="institute_id" value="<?php if(!empty($institute_info->id)){ echo $institute_info->id; } ?>">
                                <input class="form-control" readonly placeholder="Institute Name" value="<?php if(!empty($institute_info->institute_name)){   echo ucfirst($institute_info->institute_name);  }  ?>" name="text" type="text" autofocus>
                                </div>
								<div class="form-group">
									  <select class="form-control" name="course" id="student-course">
										<option  value="">Select Course / Program</option>
										<?php if (!empty($courses)) {  ?>
						                	<?php foreach ($courses as $row){ ?> 
											<option value="<?php  if(!empty($row->id)) {  echo ucfirst($row->id); } ?>"><?php if(!empty($row->course_name)) {  echo ucfirst($row->course_name); }  ?></option>

						                	<?php  } ?>
						                <?php  }  ?> 
						                
									  </select>
									  <?php echo form_error('course'); ?>
                                </div>
								<div class="form-group">
									<select class="form-control" name="branch" id="student-branch">
										    <option value="">Select Branch</option>
								    </select>
								    <?php echo form_error('branch'); ?>
                                </div>
								<div class="form-group">
									  <select class="form-control" name="semester" id="student-semester">
											<option value="">Select Semester / Year</option>
											
									  </select>
									  <?php echo form_error('semester'); ?>
                                </div>
								
								<div class="row">
      
	</div>
								 
                                <!-- Change this to a button or input when using this as a form -->
                                  <button type="submit" class="btn btn-primary btn-block login">Next</button>
								
                            </fieldset>
                        </form>
			
                    </div>
                </div>
            </div>
        </div>
    </div>