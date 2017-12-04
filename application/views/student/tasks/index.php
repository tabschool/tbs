   <!-- end navbar top -->
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> Student Tasks 
  <div class="btn-group">                 
      <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">mode_edit</i>
      </button>
      <div class="dropdown-menu" style="box-shadow:none;">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal"><i class="material-icons">note_add</i></a>     
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1"><i class="material-icons">event</i></a> 
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal2"><i class="material-icons">chrome_reader_mode</i></a> 
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3"><i class="material-icons">book</i></a> 
          
      </div>
  </div>
</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
            <!-- add book -->

 <div class="modal right fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php $book_cats = get_all_book_category();  ?>
        <div class="modal-body">
        <?php if(!empty($book_cats)){ ?>
        <?php foreach($book_cats as $row): ?>
          
          <p><a href=" <?php echo base_url('student/Libraries/index/?cat='.$row->id); ?>"><?php if(!empty($row->category_name)) echo $row->category_name; ?></a></p>
       
        
        <?php endforeach;  }else{ ?>
        
        <?php } ?>
          
        </div>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div>

<!-- end book -->
                <table class="table">
                  <tbody>

                  <?php if(!empty($tasks)){  foreach($tasks as $value){ ?>
                     
                    <tr>
                      <td> <?php echo date('d M',strtotime($value->date)) ; ?>   <span> <?php echo date('Y',strtotime($value->date)) ; ?> </span></td>
                      <td><?php $time = explode('/',$value->time); echo sprintf("%02d",$time[0]).':'.sprintf("%02d",$time[1]).' '.$time[2];  ?></td>
                      <td><?php if ($value->status==2): ?> <s><?php endif ?><?php echo $value->task;  ?> <?php if ($value->status==2): ?> </s> <?php endif ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><?php if ($value->status!=2): ?> <a class="status_change" href="javascript:;"  id="taskstatus_change<?php echo $value->id; ?>"  data="<?php echo base_url('student/Tasks/done_task/'.$value->id); ?>" title="Change Status" ><i class="material-icons">check</i></a><?php endif ?></td>
                      <td><a href="#" title="Edit Task Information" data-toggle="modal" data-target="#taskeditmodel<?php echo $value->id; ?>"><i class="material-icons">mode_edit</i></a></td>
                      <td><a class="delete_task" id="delete_task<?php echo $value->id;  ?>" href="javascript:;"  data="<?php echo base_url('student/Tasks/delete/'.$value->id); ?>" title="Delete Task Information"><i class="material-icons">delete</i></a></td>
                      
                    </tr>

<div class="modal fade" id="taskeditmodel<?php echo $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                          <input type="hidden" id="task_id<?php if(!empty($value->id)) echo $value->id;  ?>" name="task_id<?php if(!empty($value->id)) echo $value->id;  ?>" value="<?php if(!empty($value->id)) echo $value->id;  ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Task Title" id="task_title<?php if(!empty($value->id)) echo $value->id;  ?>" value="<?php if(!empty($value->task)) echo $value->task;  ?>" name="task_title" type="text" autofocus="">
                                    <span class="log_error" id="task_title_error<?php if(!empty($value->id)) echo $value->id;  ?>"></span>
                                </div>  
                
                <div class="form-group">
                                    <input class="form-control date_check" placeholder="Choose Date" id="task_date1<?php if(!empty($value->id)) echo $value->id;  ?>" value="<?php echo date('d/m/Y',strtotime($value->date)) ;  ?>" name="task_date1" type="text" autofocus="">
                                    <span class="log_error" id="task_date_error<?php if(!empty($value->id)) echo $value->id;  ?>"></span>
                                </div> 
                <div class="form-group time">
                    <select class="form-control" name="task_hour" id="task_hour<?php if(!empty($value->id)) echo $value->id;  ?>">
                    <option value="HH" > HH </option>
                    <?php for ($i=1; $i <=12 ; $i++) {  ?>

                      <option <?php if($time[0]== $i): ?>  selected <?php endif ?> value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
                  
                    <?php } ?>
                    </select>
                                </div>
                
                <div class="form-group time">
                    <select class="form-control" name="task_mint" id="task_mint<?php if(!empty($value->id)) echo $value->id;  ?>">
                     <?php for ($i=1; $i <=60 ; $i++) {  ?>

                      <option <?php if($time[1]== $i): ?>  selected <?php endif ?> value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
                  
                    <?php } ?>
                    </select>


                                </div>
                
                <div class="form-group time">
                    <select class="form-control" name="task_meri" id="task_meri<?php if(!empty($value->id)) echo $value->id;  ?>">
                    <option   <?php if($time[2]== 'AM'): ?>  selected <?php endif ?> value="AM">AM</option>
                    <option  <?php if($time[2]== 'PM'): ?>  selected <?php endif ?>  value="PM">PM</option>
                    </select>
                                </div>

                                <span class="log_error" id="hours_min_error<?php if(!empty($value->id)) echo $value->id;  ?>"></span>
                
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button"  id="edit_task_submit" onclick="return update_task(<?php if(!empty($value->id)) echo $value->id;  ?>)" value="add_task_submit" class="btn btn-primary">Update </button>
      </div>
    </div>
  </div>
</div>



                  <?php } }else{  ?>
                  <tr> <td colspan="12"> No Tasks Found.</td>     </tr>
                  <?php } ?>
                    
                  </tbody>
                </table>
            </div>

            
            
            
   
   