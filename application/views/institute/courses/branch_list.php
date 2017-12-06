
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Courses</h1>
                </div>
                <!--End Page Header -->
            </div>

			
			
			


     <div class="row login-panel panel panel-default svdf" style="margin-left:1.3%; margin-right:1%; padding:15px;">
        <div class="col-lg-6">
       
            <h4  >Course Detail</h4>
         
                
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
		<a href="<?php echo base_url('institute/courses/add_branch/'.$course->id); ?>" class="blue-button">Add Branch</a>
		</div>
        
    </div>

<div class="row login-panel panel panel-default svdf" style="margin-left:1.3%; margin-right:1%; padding:15px;">
<div class="col-lg-12">
<?php echo msg_alert_backend(); ?>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
            <tr>
                <th width="10%"> # </th>
                <th width="30%"> Branch Name </th>
                <th width="10%"> Semster </th>
                <th width="20%"> Status </th>
                <th width="10%"> Action </th>
            </tr>
        </thead>
		                            <tbody>

                                <?php  $i= $offset;  if (!empty($branches)){  foreach ($branches as $row){  $i++; ?>

                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php if (!empty($row->branch_name)) {  echo $row->branch_name; }else{  echo ' - ';  }   ?></td>
                                    <td> <a class="waves-effect waves-light darken-4 " href="<?php echo base_url('institute/courses/semesters/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons right">remove_red_eye</i></a> </td>
                                    <td>
                                        <?php 
              
                                            if(!empty($status)){  
                                               echo 'Active';    
                                            }else{
                                               echo 'In-Active';  
                                            }

                                        ?>
                                    </td>

                                    <td>
                                        <table>
                                            <tr>
                                                <td> <a href="<?php echo base_url('institute/courses/edit_branch/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons">create</i></a></td>
                                                <td> <a onclick="return confirm('Do you want to delete it?');" href="<?php echo base_url('institute/courses/branch_delete/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons">delete</i></a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                            
                                <?php   }  }else{  ?>
                                    
                                <tr>
                                    <td  style="text-align:center;"  colspan="6"> No Record Found </td>
                                </tr>

                                <?php  } ?>
                       
                            </tbody>
							 
	</table>
	<?php if(!empty($pagination)){  echo $pagination;   } ?> 
</div>
</div>
</div>
   
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="tbl_sub_heading">Course Panel ( Branches )</span>
                <a href="<?php echo base_url('institute/courses/add_branch/'.$course->id); ?>" class="btn btn-primary pull-right">Add Branch</a>
                <div class="clear"></div>
            </div>
            <div class="panel-body">
            <?php echo msg_alert_backend(); ?>
                <div class="table-responsive">
                       <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="10%"> # </th>
                                    <th width="30%"> Branch Name </th>
                                    <th width="10%"> Semster </th>
                                    <th width="20%"> Status </th>
                                    <th width="10%"> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php  $i= $offset;  if (!empty($branches)){  foreach ($branches as $row){  $i++; ?>

                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php if (!empty($row->branch_name)) {  echo $row->branch_name; }else{  echo ' - ';  }   ?></td>
                                    <td> <a class="waves-effect waves-light darken-4 " href="<?php echo base_url('institute/courses/semesters/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons right">remove_red_eye</i></a> </td>
                                    <td>
                                        <?php 
              
                                            if(!empty($status)){  
                                               echo 'Active';    
                                            }else{
                                               echo 'In-Active';  
                                            }

                                        ?>
                                    </td>

                                    <td>
                                        <table>
                                            <tr>
                                                <td> <a href="<?php echo base_url('institute/courses/edit_branch/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons">create</i></a></td>
                                                <td> <a onclick="return confirm('Do you want to delete it?');" href="<?php echo base_url('institute/courses/branch_delete/'.$row->course_id.'/'.$row->id); ?>" title=""><i class="material-icons">delete</i></a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                            
                                <?php   }  }else{  ?>
                                    
                                <tr>
                                    <td  style="text-align:center;"  colspan="6"> No Record Found </td>
                                </tr>

                                <?php  } ?>
                       
                            </tbody>
                        </table>     
                        <?php if(!empty($pagination)){  echo $pagination;   } ?> 
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    
    <!-- Modal -->
  
</div>

                            
        <!-- end page-wrapper -->

    </div>