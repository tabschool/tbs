    <div class="container">       
        <div class="row">           
            <div class="col-md-8 center">
                <div class="login-panel panel panel-default academic">                  
                   
                    <div class="panel-body ">
					<h3>Yay! Let's Go!</h3>
					<p>Fill out some Academic Details </p>
                      <?php echo  form_open(current_url(),array('role'=>'form')); ?>
                        <fieldset>
							<div class="form-group">
							    <input type="hidden" name="institute_id" id="institute_id" value="<?php if(!empty($institute_info->id)){ echo $institute_info->id; } ?>">
                                <input class="form-control" readonly placeholder="Institute Name" value="<?php if(!empty($institute_info->institute_name)){   echo ucfirst($institute_info->institute_name);  }  ?>" name="text" type="text" autofocus>
                            </div>
								
						    <div class="row">
						        <div class="form-group">
						            <div class="searchable-container">
						             
									 <p style="margin-top: 20px;">Select Your Courses</p>
									<ul>
						                <?php if (!empty($courses)) {  ?>
						                	<?php foreach ($courses as $row){ ?> 
						                	 
						            		    <li>
								                    <div class="info-block block-info clearfix">
								                        <div class="square-box pull-left">
								                        </div>
								                        <div data-toggle="buttons" class="btn-group bizmoduleselect">
								                            <label class="btn btn-default course_select">
								                                <div class="bizcontent">
								                                    <input type="checkbox" id="course_id_<?php echo  $row->id; ?>" name="course_id[]" autocomplete="off" value="<?php   
																		if(!empty($row->id)) {  
																			echo ucfirst($row->id);
																		} 
																	?>">
																	<p>
																	<?php if(!empty($row->course_name)) {  echo ucfirst($row->course_name); }  ?>
																	</p>
								                                </div>
								                            </label>
								                        </div>
								                    </div>
								                </li>

						                	<?php  } ?>
						                <?php  } else { ?> 
						                	<b>Courses Not Found</b>
						                <?php  }  ?>

										</ul>
										 <?php echo form_error('course_id[]') ?>
										
										<p style="margin-top: 20px;">Select Your Branch /Programs</p>
									    <ul id="branch_program">
						                  	<h3 class="text-center">No Branch Found</h3>
										</ul>
										 <?php echo form_error('branch_id[]') ?>
										
										<p>   Select Your Semester / Year </p>
										<div id="semester_div">
										    <ul>
							                  <h3 class="text-center">No Semester / Year  Found</h3>
											</ul>
											
										</div>
									<?php echo form_error('semester[]') ?>
										
						            </div>
						        </div>
							</div>
								 
                                <!-- Change this to a button or input when using this as a form -->
                            	
							<button type="submit" class="btn btn-primary btn-block login">Next</button>
                            </fieldset>
                        <?php echo  form_close(); ?>
			
                    </div>
                </div>
            </div>
        </div>
    </div>
