   <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">STUDENTS
					<div class="btn-group">					
    
      <a href="<?php echo base_url('institute/students/add' ) ?>"><i class="material-icons">mode_edit</i></a>
    
    
</div>	
					</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row login-panel panel panel-default svdf"> 
          <table class="table table-hover">
  <thead>
    <tr>
      <th>ENROLL NO.</th>
      <th>FIRST NAME</th>
      <th>LAST NAME</th>
      <th>EMAIL</th>
      <th>COURSE/PROGRAM</th>
      
      <th>YEAR/SEM</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  
  <?php
    if (!empty($students)):
    $i = 0; foreach ($students as $row) { $i++;
    ?>
    <tr>
      <td><?php echo $row->enrollment_number; ?></td>
      <td><?php echo $row->first_name; ?></td>
      <td><?php echo $row->last_name; ?></td>
      <td><?php echo $row->email; ?></td>
      <td>CLASS X, XI,XII</td>
     
      <td>Medical, Non Medical</td>
      <td><a href="<?php echo base_url('institute/students/edit/' . $row->id ) ?>"><i class="material-icons">mode_edit</i></a></td>
      <td><a href="<?php echo base_url('institute/students/delete/' . $row->id ) ?>" onclick="return confirm('Are you sure want to delete?');"><i class="material-icons">delete</i></a></td>
      <td>
	  <form>
	  <div class="form-group mit">
      <input type="checkbox" checked data-toggle="toggle" data-style="ios"/>
      </div>
	  </form>
	  </td>
  
    </tr>
    <?php } ?><?php else: ?>
    <tr>
        <th colspan="10">
            <center>No Student User Found.</center>
        </th>
    </tr>
    <?php endif; ?>
	
  </tbody>
</table>
    </div>
    <div class="text-right"> <?php if (!empty($pagination)) echo $pagination; ?></div>
                        
        <!-- end page-wrapper -->

</div>