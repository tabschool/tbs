
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


</div>

<?php $notebook =  get_all_notebook(); ?>		
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-panel modal-margin-fix panel panel-default">                  
                <div class="panel-body">
                    <form role="form">
                        <span style="display:none;" id="success_msg_note" class="alert alert-succes"></span>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Title" id="notes_title"  name="notes_title" type="text" autofocus="">
                                <span class="log_error" id="note_title_error"></span>
                            </div> 
                            <div class="form-group">
                                <select class="form-control" id="note_book_id">
                                    <option  value=""> - Select NoteBook - </option>
                                    <?php if(!empty($notebook)){ foreach($notebook as $value){ ?>
                                        <option value="<?php echo $value->id; ?>"><?php if(!empty($value->notebook)){ echo ucfirst($value->notebook);  }   ?></option>
                                    <?php } } ?>
                                </select>
                                <span class="log_error" id="note_book_error"></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="notes_description"  name="notes_description"  placeholder="Add Description" autofocus=""></textarea>
                                 <span class="log_error" id="note_desc_error"></span>
                            </div>  
                        </fieldset>
                    </form>
                </div>
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" id="add_notes" class="btn btn-primary"> Save </button>
      </div>
    </div>
  </div>
</div>


<!-- add event -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel modal-margin-fix panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Task Title" id="task_title" name="task_title" type="text" autofocus="">
                                    <span class="log_error" id="task_title_error"></span>
                                </div>  
								
								<div class="form-group">
                                    <input class="form-control" placeholder="Choose Date" id="task_date" name="task_date" type="text" autofocus="">
                                    <span class="log_error" id="task_date_error"></span>
                                </div> 
								<div class="form-group time">
									  <select class="form-control" name="task_hour" id="task_hour">
										<option value="" > HH </option>
										<?php for ($i=1; $i <=12 ; $i++) {  ?>

											<option value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
									
										<?php } ?>
									  </select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control" name="task_mint" id="task_mint">
										 <?php for ($i=1; $i <=60 ; $i++) {  ?>

											<option value="<?php echo $i;  ?>" ><?php echo sprintf("%02d", $i);  ?></option>
									
										<?php } ?>
									  </select>


                                </div>
								
								<div class="form-group time">
									  <select class="form-control" name="task_meri" id="task_meri">
										<option value="AM">AM</option>
										<option value="PM">PM</option>
									  </select>
                                </div>

                                <span class="log_error" id="hours_min_error"></span>
								
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button"  id="add_task_submit" value="add_task_submit" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
           <!-- create notebook -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel modal-margin-fix panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="notebook_name" placeholder="Create New Notebook" name="text" type="text" autofocus="">
                                    <p style="color:red;" id="notebook_name_error"></p>
                                </div> 	
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="create_notebook" class="btn btn-primary">done </button>
      </div>
    </div>
  </div>
</div>

<!-- end create notebook -->

<!--delete Note-Book  confirmation-->
<div class="modal fade" id="confirmdel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/surprised.png" alt="Are You Sure?">
				<h4>Are you sure you want to Delete NoteBoook?</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
				<button type="button" id="delete" class="btn btn-primary">YES, DELETE IT</button>
      </div>
		</div>
	</div>
</div>
<!--end delete Note-Book confirmation-->

<!--delete Note-Book Chapter  confirmation-->
<div class="modal fade" id="confirmdelChapter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/surprised.png" alt="Are You Sure?">
				<h4>Are you sure you want to Delete NoteBoook?</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
				<button type="button" id="delete" class="btn btn-primary">YES, DELETE IT</button>
      </div>
		</div>
	</div>
</div>
<!--end delete Note-Book Chapter confirmation-->

<!-- Add Book -->
<div class="modal fade" id="confirmBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/book.png" alt="Are You Sure?">
				<h4>Yay!! Thanks for choosing this book</h4>
				<h4>Do you want to add this book as your own?</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" id="yes_add" class="btn btn-primary">YES</button>
				<button type="button"  class="btn btn-primary" data-dismiss="modal">NO</button>
				
      </div>
		</div>
	</div>
</div>
<!-- End Add Book -->
<!-- Congratulaions-->
<div class="modal fade" id="congrats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/book.png" alt="Are You Sure?">
				<h4>Congratulations! The book is successfully added</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" id="thanks" class="btn btn-primary">THANKS</button>
				
      </div>
		</div>
	</div>
</div>

<!-- Allready Added-->
<div class="modal fade" id="already_checked" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/book.png" alt="Are You Sure?">
				<h4>OPPS! Allready You have added This Book </h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" id="checked_out" class="btn btn-primary">THANKS</button>
				
      </div>
		</div>
	</div>
</div>
<!-- End Allready Added-->

<!-- Motto-->
<div class="modal fade" id="yourBio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/balloons.png" alt="Are You Sure?">
				<h4>Yay!! Your new bio is updated</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
				<button type="button" id="sure_one" class="btn btn-primary">OK, THANKS</button>
				
      </div>
		</div>
	</div>
</div>	 

<!-- password-->
<div class="modal fade" id="yourPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/key.png" alt="Are You Sure?">
				<h4>Yay!! Your new password is updated</h4>
				</div>
			</div>
			<div class="modal-footer center">
				<button type="button"  id="passsure_one"  class="btn btn-primary">OK</button>
            </div>
		</div>
	</div>
</div>	 


<!-- password-->
<div class="modal fade" id="yourEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/key.png" alt="Are You Sure?">
				<h4>Yay!! Your new email is updated</h4>
				</div>
			</div>
			<div class="modal-footer center">
				<button type="button"  id="email_one"  class="btn btn-primary">OK</button>
            </div>
		</div>
	</div>
</div>	 

<!-- TaskDone -->
<div class="modal fade" id="taskDone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/checked.png" alt="Are You Sure?">
				<h4>Are you sure that you have completed your task?</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" id="its_done" class="btn btn-primary">It's done</button>
				<button type="button" class="btn btn-primary">Cancel</button>
				
      </div>
		</div>
	</div>
</div>	

<!--delete Note-Book  confirmation-->
<div class="modal fade" id="Delete_modal_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="static-modal-text">
				<img src="<?php echo base_url('assets/student/'); ?>img/surprised.png" alt="Are You Sure?">
				<h4>Are you sure you want to Delete Task?</h4>
				</div>
			</div>
			 <div class="modal-footer center">
				<button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
				<button type="button" id="delete" class="btn btn-primary">YES, DELETE IT</button>
      </div>
		</div>
	</div>
</div>
<!--end delete Note-Book confirmation-->
	