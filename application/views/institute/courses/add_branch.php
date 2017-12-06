
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Courses</h1>
                </div>
                <!--End Page Header -->
            </div>

			
			


         <div class="row login-panel panel panel-default svdf" style="margin-left:1.3%; margin-right:1%; padding:15px;">
        <div class="col-lg-6">
       
            <h4>Course Detail</h4>        
                
                            <p>
                                 <strong>Course Name : </strong> <?php if(!empty($course->course_name)){  echo  ucfirst($course->course_name);  }else{  echo  ' NA ';   }?>
                            </p>
                            <p>
                                 <strong>Course Category  : </strong> <?php  $category_name= get_course_category_name($course->course_category_id);   if(!empty($category_name->course_category_name)){  echo ucfirst($category_name->course_category_name); }  ?>
                            </p>
                            <p>
                                 <strong>Duraction (In months) : </strong> <?php if(!empty($category_name->course_duration)){  echo ucfirst($category_name->course_duration); } ?>
                            </p>
                               
                                
                          
                            
                                <strong>Total Duration  <small>(Semester / months)</small> : </strong> <?php if(!empty($course->duration_year_sem_months)){  echo  ucfirst($course->duration_year_sem_months);  }else{  echo  ' NA ';   }?>
                            </p>
                            <p>
                                <strong> Status: </strong> <?php  if(!empty($course->status) && $course->status==1){  echo  'Active';  }else{    echo 'InActive';    }  ?>
                            </p>
                             
                               
                          
                            
               
        </div>
		<div class="col-lg-6">
			<?php echo form_open(current_url(),array('method'=>'post','class'=>'ng-pristine ng-valid')); ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> </label>
                                <input id="branch_name" name="branch_name" value="<?php echo  set_value('branch_name');  ?>"  ng-model="class_info.class_code" class="form-control required ng-pristine ng-valid" type="text" name="class_code" id="class_code" placeholder="Branch Name" maxlength="45">
                                <?php echo form_error('branch_name');  ?>
                            </div>
                        </div> 

                       
                        <div class="col-md-12">
                            <input class="blue-button" ng-click="add_update_class()" type="submit" name="add_class_btn" id="add_class_btn" value="Submit">
                        </div>
                    <?php    echo  form_close(); ?>
		</div>
        
    </div>

        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="tbl_sub_heading">Course Panel ( Branches )</span>
               
                <div class="clear"></div>
            </div>
            <div class="panel-body" style="min-height:400px;">
                    <?php echo form_open(current_url(),array('method'=>'post','class'=>'ng-pristine ng-valid')); ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> </label>
                                <input id="branch_name" name="branch_name" value="<?php echo  set_value('branch_name');  ?>"  ng-model="class_info.class_code" class="form-control required ng-pristine ng-valid" type="text" name="class_code" id="class_code" placeholder="Branch Name" maxlength="45">
                                <?php echo form_error('branch_name');  ?>
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
			 
