
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add Courses</h1>
                </div>
                <!--End Page Header -->
            </div>


	<div class="row login-panel panel panel-default svdf" style="margin-left:1.3%; margin-right:1%; padding:15px;"> 
	<div class="col-lg-12">
	<form class="form-container" action="" method="">
	<fieldset>
	<?php echo form_open(current_url(),array('method'=>'post','class'=>'ng-pristine ng-valid')); ?>
	<div class="col-lg-12">
		<div class="form-group">
			<label>Course Name</label>
			<input id="course_name" name="course_name" value="<?php echo  set_value('course_name');  ?>"  ng-model="class_info.class_code" class="form-control required ng-pristine ng-valid" type="text" name="class_code" id="class_code" placeholder="Course Name" maxlength="45">
			<?php echo form_error('course_name');  ?>
		</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
                                <label>Course Category</label>
                                <select class="form-control required ng-pristine ng-valid" id="course_category_id"  name="course_category_id" > 
                                    <option value="">Choose Category</option>
                                    <?php if(!empty($category)){  foreach($category as $value){  ?>
                                        <option value="<?php  echo $value->id;   ?>"><?php  echo ucfirst($value->course_category_name);  ?></option>      
                                    <?php }  } ?>
                                </select>
                                <?php echo form_error('course_category_id');  ?>
                            </div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
                                <label>Number of Year / Sems / Months</label>
                                <input id="duration_year_sem_months"   name="duration_year_sem_months" ng-model="class_info.class_code" class="form-control " type="text"  placeholder="Year / Sems / Months" >
                                <?php echo form_error('duration_year_sem_months');  ?>
                            </div>
		</div>
		<div class="col-md-12">
                            <input class="blue-button" ng-click="add_update_class()" type="submit" name="add_class_btn" id="add_class_btn" value="Submit">
                        </div>
                    <?php    echo  form_close(); ?>
	</fieldset>
</form>
</div>
</div>

			
         <div class="row">
    <div class="col-lg-12">      
	
	
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="tbl_sub_heading">Course Panel</span>
                <a href="#" class="btn btn-primary pull-right">Add Course</a>
                <div class="clear"></div>
            </div>
            <div class="panel-body" style="min-height:400px;">
                    <?php echo form_open(current_url(),array('method'=>'post','class'=>'ng-pristine ng-valid')); ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input id="course_name" name="course_name" value="<?php echo  set_value('course_name');  ?>"  ng-model="class_info.class_code" class="form-control required ng-pristine ng-valid" type="text" name="class_code" id="class_code" placeholder="Class Code" maxlength="45">
                                <?php echo form_error('course_name');  ?>
                            </div>
                        </div> 

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course Category</label>
                                <select class="form-control required ng-pristine ng-valid" id="course_category_id"  name="course_category_id" > 
                                    <option value="">Choose Category</option>
                                    <?php if(!empty($category)){  foreach($category as $value){  ?>
                                        <option value="<?php  echo $value->id;   ?>"><?php  echo ucfirst($value->course_category_name);  ?></option>      
                                    <?php }  } ?>
                                </select>
                                <?php echo form_error('course_category_id');  ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No of year/sem/months</label>
                                <input id="duration_year_sem_months"   name="duration_year_sem_months" ng-model="class_info.class_code" class="form-control " type="text"  placeholder="No of year/sem/months" >
                                <?php echo form_error('duration_year_sem_months');  ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-primary" ng-click="add_update_class()" type="submit" name="add_class_btn" id="add_class_btn" value="Submit">
                        </div>
                    <?php    echo  form_close(); ?>
                </div>

            
        </div>
        <!--End Advanced Tables -->
    </div>
    
    
</div>
			 
