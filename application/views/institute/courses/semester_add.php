
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Courses</h1>
                </div>
                <!--End Page Header -->
            </div>

			
			
			
         <div class="row">
    <div class="col-lg-12">

         <div class="row login-panel panel panel-default info">
        <div class="col-md-7 col-sm-7">
       
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
            <p>
                <strong>Total Duration  <small>(Semester / months)</small> : </strong> <?php if(!empty($course->duration_year_sem_months)){  echo  ucfirst($course->duration_year_sem_months);  }else{  echo  ' NA ';   }?>
            </p>
            <p>
                <strong> Status: </strong> <?php  if(!empty($course->status) && $course->status==1){  echo  'Active';  }else{    echo 'InActive';    }  ?>
            </p>            
                                
            <h4>Branch Detail</h4>  
 
            <p>
                 <strong>Branch Name : </strong>  <?php if(!empty($branch->branch_name)){  echo  ucfirst($branch->branch_name);  }else{  echo  ' NA ';   } ?>
            </p>
                           
                            
               
        </div>
        
    </div>
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="tbl_sub_heading">Course Panel ( Branches > Semester ) </span>
               
                <div class="clear"></div>
            </div>
            <div class="panel-body" style="min-height:400px;">
                    <?php echo form_open(current_url(),array('method'=>'post','class'=>'ng-pristine ng-valid')); ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Semester Name</label>
                                <input id="semester_name" name="semester_name" value="<?php echo  set_value('semester_name');  ?>"  ng-model="class_info.class_code" class="form-control required ng-pristine ng-valid" type="text"  placeholder="Semester Name" >
                                <?php echo form_error('semester_name');  ?>
                            </div>
                        </div> 

                        <div class="col-md-12">
                            <table class="table responsive-table" style="margin-bottom: 10px;">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Description</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="add-new-row">
                                    <tr>
                                        <td>
                                            <input type="text" class="validate form-control require" name="subject_name[]" id="enrollmentno" placeholder="Enter subject Name." required="">
                                            <div class="error"><?php echo form_error('subject_name'); ?></div>
                                        </td>
                                        <td>
                                            <input type="text" class="validate form-control require" name="description[]" id="description" placeholder="Enter Description" required="">
                                            <div class="error"><?php echo form_error('description'); ?></div>
                                        </td> 
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                        <a class="waves-effect waves-light btn blue darken-4" id="add-student-id">Add Subject</a>
                            <input class="btn btn-primary" ng-click="add_update_class()" type="submit" name="add_class_btn" id="add_class_btn" value="Submit">
                        </div>
                    <?php    echo  form_close(); ?>
                </div>

            
        </div>
        <!--End Advanced Tables -->
    </div>
    
    
</div>
		
         <script>
    $(document).ready(function (){
        $("#add-student-id").on("click",function (){
            var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="validate form-control require" name="subject_name[]" id="subject_name" placeholder="Enter Subject Name">\n\
                            <div class="error"><?php echo form_error("subject_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="validate form-control require" name="description[]" id="description" placeholder="Enter Description">\n\
                            <div class="error"><?php echo form_error("description"); ?></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    
    });
</script>    	 
