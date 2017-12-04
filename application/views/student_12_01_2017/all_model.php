
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
        <div class="login-panel panel panel-default">                  
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
       <div class="login-panel panel panel-default">                  
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
       <div class="login-panel panel panel-default">                  
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
			 
	