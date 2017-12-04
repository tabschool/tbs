
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Courses</h1>
                </div>
                <!--End Page Header -->
            </div>

			
			
			
         <div class="row">
    <div class="col-lg-12">



        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="tbl_sub_heading">Course Panel</span>
                <a href="<?php echo base_url('institute/courses/add'); ?>" class="btn btn-primary pull-right">Add Course</a>
                <div class="clear"></div>
            </div>
            <div class="panel-body">
            <?php echo msg_alert_backend(); ?>
                <div class="table-responsive">
                 <table class="table table-hover">
                        <thead>
                                <tr>
                                    <th>Course Id.</th>
                                    <th>Course Name</th>
                                    <th>Branches</th>
                                    <th>Subjects</th>
                                    <th>No. of Installments</th>
                                    <th>Year/Sem</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    <tbody>

                              <?php  $i= $offset;  if (!empty($courses)){  foreach ($courses as $row){  $i++; ?>

<tr>
                                    <td>20034</td>
                                    <td><?php if(!empty($row->course_name)){  echo  ucfirst($row->course_name);  }else{  echo  ' NA ';   }?></td>
                                    <td>
                                        <a class="waves-effect waves-light darken-4 " data-activates='branches' href="<?php  echo base_url('institute/courses/branches/'.$row->id); ?>"><i class="material-icons right">remove_red_eye</i></a>
                                    </td>
                                    <td><a class="waves-effect waves-light darken-4 " data-activates='branches' href="#"><i class="material-icons right">remove_red_eye</i></a></td>
                                    <td><a class="waves-effect waves-light darken-4 " data-activates='branches' href="#"><i class="material-icons right">remove_red_eye</i></a></td>
                                    <td><a class="waves-effect waves-light darken-4 " data-activates='branches' href="#"><i class="material-icons right">remove_red_eye</i></a></td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td><a href="<?php echo base_url('institute/courses/edit/'.$row->id); ?>" title=""><i class="material-icons">create</i></a></td>
                                                <td><i class="material-icons">delete</i></td>
                                              
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
                                   

<!--                                <tr>
                                    <td>20034</td>
                                    <td><?php if(!empty($row->course_name)){  echo  ucfirst($row->course_name);  }else{  echo  ' NA ';   }?></td>
                                    <td><a class="waves-effect waves-light darken-4 dropdown-button" data-activates='branches' href="#"><i class="material-icons right">remove_red_eye</i></a>
                                    <ul id='branches' class='dropdown-content'>
                                        <li><a href="#!">View Branches</a></li>
                                        <li><a href="#!">Marketing</a></li>
                                        <li><a href="#!">Finance</a></li>
                                        <li><a href="#!">Human Resources</a></li>
                                        <li><a href="#!">Operation Management</a></li>
                                        <li><a href="#!">Information Management</a></li>
                                        </ul>
                                    </td>
                                    
                                    <td><a class="waves-effect waves-light darken-4 dropdown-button" data-activates='subjects' href="#"><i class="material-icons right">remove_red_eye</i></a>
                                    <ul id='subjects' class='dropdown-content'>
                                        <li><a href="#!">Browse Subjects</a></li>
                                        <li><a href="#!">Marketing</a></li>
                                        <li><a href="#!">Finance</a></li>
                                        <li><a href="#!">Human Resources</a></li>
                                        <li><a href="#!">Operation Management</a></li>
                                        <li><a href="#!">Information Management</a></li>
                                        </ul>
                                    </td>
                                    
                                    <td><a class="waves-effect waves-light darken-4 dropdown-button" data-activates='installment' href="#"><i class="material-icons right">remove_red_eye</i></a>
                                    <ul id='installment' class='dropdown-content min-width'>
                                        <li><a href="#!">
                                            <div class="left">Down Payment</div>
                                            <div class="right">90,000/-</div>
                                        </a></li>
                                        <li><a href="#!">
                                            <div class="left">Installment 1</div>
                                            <div class="right">21,000/-</div>
                                        </a></li>
                                        <li><a href="#!">
                                            <div class="left">Installment 2</div>
                                            <div class="right">21,000/-</div>
                                        </a></li>
                                        <li><a href="#!">
                                            <div class="left">Installment 3</div>
                                            <div class="right">21,000/-</div>
                                        </a></li>
                     
                                        
                                        
                                        </ul>
                                    </td>
                                   
                                   <td>
                                        <a class="waves-effect waves-light darken-4 dropdown-button" data-activates='year' href="#"><i class="material-icons right">remove_red_eye</i></a>
                                    
                                        <ul id='year' class='dropdown-content'>
                                            <li>Semeter I</a></li>
                                            <li>Semeter II</a></li>
                                            <li>Semeter III</li>
                                            <li>Semeter IV</li>
                                        </ul>
                                    </td>
                                   
                                    <td>
                                        <table>
                                            <tr>
                                                <td><i class="material-icons">create</i></td>
                                                <td><i class="material-icons">delete</i></td>
                                                <td>
                                                <div class="switch">
                                                <label>
                                                Off
                                                <input type="checkbox">
                                                 <span class="lever"></span>
                                                 On
                                                 </label>
                                                </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> -->


                                    
                        <?php   }  }else{  ?>
                                    
                                <tr>
                                    <td  style="text-align:center;"  colspan="6"> No Record Found </td>
                                    
                                </tr>

                        <?php  } ?>
                       

       
                                
                            </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    
    <!-- Modal -->
  
</div>

                            
        <!-- end page-wrapper -->

    </div>