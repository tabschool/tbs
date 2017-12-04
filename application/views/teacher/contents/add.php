                <div class="col-lg-12">
                    <h1 class="page-header">CREATE CONTENT
</h1>
                </div>
                <!--End Page Header -->
            </div>
    <div class="row login-panel panel panel-default"> 

            
			<form method="post" enctype="multipart/form-data" role="form" id="h5p-content-form">
			<input type="hidden" id="institute_id" name="institute_id" value="<?php if(!empty($teacher->parent_id)){ echo $teacher->parent_id; }  ?>">
			<div class="col-md-12 first_field ">	       
                <div class="panel-body pay_fe"  id="titlediv">

                    <fieldset >
                        <div class="form-group">
                            
                            <input class="form-control" placeholder="Title" id="title" type="text" name="title" value="<?php  echo  set_value('title');  ?>"  autofocus="">
              				<?php echo form_error('title');    ?>

                        </div> 
						<div class="form-group">
                            <input class="form-control" placeholder="Description" name="description" value="<?php echo set_value('description'); ?>" type="text" autofocus="">
                            <?php echo  form_error('description');   ?>
                        </div>
                        <div class="form-group">
                        <!--  <div class="h5p-upload">
					          <input type="file" name="h5p_file" id="h5p-file"/>
					                      <div class="h5p-disable-file-check">
					              <label><input type="checkbox" name="h5p_disable_file_check" id="h5p-disable-file-check"/> Disable file extension check</label>
					              <div class="h5p-warning">Warning! This may have security implications as it allows for uploading php files. That in turn could make it possible for attackers to execute malicious code on your site. Please make sure you know exactly what you're uploading.</div>
					            </div>
                        </div> -->
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-3">			                
                   <div class="panel-body pay_fe">
                       <div>
					   <label>
					  <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
					  <label for="checkbox-1" class="checkbox-custom-label">Set Time</label>
					  </label>
					</div>
					
								
								<div class="form-group s-item">
									  <select class="form-control" name="content-course" id="content-course">
									    <option value="">- Select Course - </option>
										<?php if(!empty($institute_courses)){ ?>
												<?php foreach ($institute_courses as $value) { ?>
													<option   value="<?php echo $value->id ?>"><?php  echo  ucfirst($value->course_name); ?></option>
												<?php } ?>
										<?php } ?>
									  </select>
									  <?php echo form_error('content-course');    ?>
                                </div>
								
								<div class="form-group s-item">
									<select class="form-control"  name="content-branch" id="content-branch">
									    <option value="">- Select Branch- </option>
										
									</select>
									<?php echo form_error('content-branch');    ?>
                                </div>

                                <div class="form-group s-item">
									 <select class="form-control"  name="content-semester" id="content-semester">
									    <option value="">- Select Year Semester- </option>
										
									  </select>
									  <?php echo form_error('content-semester');    ?>
                                </div>
								
								<div class="form-group s-item">
									<select class="form-control"  name="content-subject" id="content-subject">
										<option>- Select Subject -</option>
									</select>
									<?php echo form_error('content-subject');    ?>
                                </div>

                                <div class="postbox ">
						     
							        <div id="minor-publishing" style="display:none">
								          <label><input type="radio" name="action" value="upload"/>Upload</label>
								          <label><input type="radio" name="action" value="create"/>Create</label>
								          <input type="hidden" name="library" value="0"/>
								          <input type="hidden" name="parameters" value="{}"/>
								          <input type="hidden" id="yes_sir_will_do" name="yes_sir_will_do" value="ae31ae7ed0" /><input type="hidden" name="_wp_http_referer" value="/tabschool/wordpress/wp-admin/admin.php?page=h5p_new" />        
							        </div>
						       
						        </div>
					<div>
                </div>         
				
            </div>
            </div>
			<div class="col-md-9">	
			<div class=" panel installment">                  
                   <div class="panel-body">
				  <h2>Start</h2>
                            <fieldset>
                                <div class="form-group time">
                                    <input class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>" placeholder="Date" type="text" id="datepicker" />
                                    <?php echo form_error('start_date');   ?>
                                </div>
								<div class="form-group time">
								  <select class="form-control" name="start_HH" id="sel1">
									<option value="" > HH </option>
									<?php for ($i=1; $i <=12 ; $i++) {  ?>
										<option value="<?php echo $i; ?>" ><?php echo sprintf("%02d", $i);  ?></option>
									<?php } ?>
								  </select>
								  <?php echo form_error('start_HH'); ?>
                                </div>
								
								<div class="form-group time">
									<select class="form-control" name="start_MM" id="sel1">
										<option value="">MM</option>
		                                <?php for ($i=1; $i <=60 ; $i++) {  ?>
											<option value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
										<?php } ?>
									</select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control"  name="start_meridian" id="sel1">
											<option value="AM">AM</option>
											<option value="PM">PM</option>
									  </select>
                                </div> 
								
                            </fieldset>
						<h2>End</h2>
                            <fieldset>
                                <div class="form-group time" >
                                   <input class="form-control" placeholder="Date" value="<?php echo set_value('end_date'); ?>"  name="end_date" type="text" id="datepicker2" />
                                   <?php echo form_error('end_date');   ?>
                                </div>
								<div class="form-group time">
									  <select class="form-control" name="end_HH" id="sel1">
										<option>HH</option>
											<?php for ($i=1; $i <=12 ; $i++) {  ?>

											<option value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
									
										<?php } ?>
									  </select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control" name="end_MM" id="sel1">
										<option value="">MM</option>
											<?php for ($i=1; $i <=60 ; $i++) {  ?>

											<option value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
									
										<?php } ?>
									  </select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control" name="end_meridian" id="sel1">
										<option value="AM">AM</option>
										<option value="PM">PM</option>
									  </select>
                                </div> 
								
							    <div id="post-body-content" class="form-group">
							        <div class="h5p-upload">
							          <input type="file" name="h5p_file" id="h5p-file"/>
							                      <div class="h5p-disable-file-check">
							              <label><input type="checkbox" name="h5p_disable_file_check" id="h5p-disable-file-check"/> Disable file extension check</label>
							              <div class="h5p-warning">Warning! This may have security implications as it allows for uploading php files. That in turn could make it possible for attackers to execute malicious code on your site. Please make sure you know exactly what you're uploading.</div>
							            </div>
							                  </div>
							        <div class="h5p-create"><div class="h5p-editor">Waiting for javascript...</div></div>
							     </div>
							      
								
                            </fieldset>
							

<br><br>
             
           
							<div id="major-publishing-actions">
								<button type="submit" name="submit"  class="btn btn-primary bottom-button">Create & SEND </button>
								<button type="button" class="btn btn-primary bottom-button">CREATE AS DRAFT </button>
								</div>
                        </form>
                </div>
                </div>
                </div>
