<div class="col s12 m12 l10" style="margin-top:1.5%;">
    <div class="card white">
        <div class="card-content black-text">
            <div class="card-title" style="padding-bottom:3%; float:left;">Course Detail</div>
            <div class="right"><td><i class="material-icons grey-text">create</i></td></div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="col s12 m6 21">
                            <p>
                                 <strong>Course Name : </strong> <?php if(!empty($course->course_name)){  echo  ucfirst($course->course_name);  }else{  echo  ' NA ';   }?>
                            </p>
                            <p>
                                 <strong>Course Category  : </strong> <?php  $category_name= get_course_category_name($course->course_category_id);   if(!empty($category_name->course_category_name)){  echo ucfirst($category_name->course_category_name); }  ?>
                            </p>
                            <p>
                                 <strong>Duraction (In months) : </strong> <?php if(!empty($category_name->course_duration)){  echo ucfirst($category_name->course_duration); } ?>
                            </p>  
                        </div>
                        <div class="col s12 m6 21">
                            <p>
                                <strong>Total Duration  <small>(Semester / months)</small> : </strong> <?php if(!empty($course->duration_year_sem_months)){  echo  ucfirst($course->duration_year_sem_months);  }else{  echo  ' NA ';   }?>
                            </p>
                            <p>
                                <strong> Status: </strong> <?php  if(!empty($course->status) && $course->status==1){  echo  'Active';  }else{    echo 'InActive';    }  ?>
                            </p>
                           
                        </div>
                            
                    </div>
                </div>
        </div>
        
    </div>

      <div class="card white">
          <div class="card-content black-text">
          <?php echo form_open(current_url(),array('method'=>'post')); ?>
            <div class="card-title" style="padding-bottom:3%;">Create Semester</div>
                <div class="row">
                <div class="col s12 m12 l12">
                  
                  <div class="input-field col s12 m12 l12">
                      <input id="semester_name" name="semester_name" type="text" class="validate">
                      <label for="semester_name">Semester Name</label>
                      <?php echo form_error('semester_name');  ?>
                  </div>
                 

                   <table class="striped responsive-table" style="margin-bottom: 10px;">
                	<thead>
                    	<tr>
                        	<th>Subject Name</th>
                            <th>Description</th>
                           
                        </tr>
                    </thead>
                    <tbody id="add-new-row">
                    	<tr>
                            <td>
                                <input type="text" class="validate" name="subject_name[]" id="enrollmentno" placeholder="Enter subject Name." required="">
                                <div class="error"><?php echo form_error('subject_name'); ?></div>
                            </td>
                            <td>
                                <input type="text" class="validate" name="description[]" id="description" placeholder="Enter Description" required="">
                                <div class="error"><?php echo form_error('description'); ?></div>
                            </td> 
                        
                        </tr>
                    </tbody>
                </table>
            
                  
    
                  

                  <div class="clearfix"></div>
                  <a class="waves-effect waves-light btn blue darken-4" id="add-student-id">Add Subject</a>
                  <button type="submit" class="waves-effect waves-light btn blue darken-4 ">Add Semester</button>

                  </div>
                </div>
                <?php    echo  form_close(); ?>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function (){
        $("#add-student-id").on("click",function (){
            var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="validate" name="subject_name[]" id="subject_name" placeholder="Enter Subject Name">\n\
                            <div class="error"><?php echo form_error("subject_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="validate" name="description[]" id="description" placeholder="Enter Description">\n\
                            <div class="error"><?php echo form_error("description"); ?></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    
    });
</script>    