     <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">MY NOTES 
					<div class="btn-group">					
					    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      <i class="material-icons">mode_edit</i>
					    </button>
					    <div class="dropdown-menu">
					      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal"><i class="material-icons">note_add</i></a>     
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1"><i class="material-icons">event</i></a> 
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal2"><i class="material-icons">chrome_reader_mode</i></a> 
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3"><i class="material-icons">book</i></a> 
							<a class="dropdown-item" href="chat-layout.html"><i class="material-icons">chat_bubble</i> </a>  
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
				<div class="modal-body">
					<p><a href="#">GENERAL</a></p>
					<p><a href="#">RESEARCH JOURNALS</a></p>
					<p><a href="#">HISTORY</a></p>
					<p><a href="#">OTHER HUMANTIES</a></p>
					<p><a href="#">ENGINEERING</a></p>
					<p><a href="#">ECONOMICS</a></p>
					<p><a href="#">MEDICAL</a></p>
					<p><a href="#">SCIENCE</a></p>
					<p><a href="#">SCHOOL BOOKS</a></p>
					<p><a href="#">IIT-JEE</a></p>
					<p><a href="#">NEET / AIIMS</a></p>
					<p><a href="#">BANK PO / IAS</a></p>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div>

<!-- end book -->
                <table class="table">
				  <tbody>


					
				<?php if (!empty($notes)) { ?> 
                
                <?php $i=0; foreach ($notes as  $value) {  ?>		  
					<tr data-toggle="collapse" data-target="#demo<?php echo $i;  ?>">
					   <td> <?php echo date('d M',strtotime($value->create_at)) ; ?>   <span> <?php echo date('Y',strtotime($value->create_at)) ; ?> </span></td>
                      <td><?php echo date('H:i:A',strtotime($value->create_at)) ?> </td>
                      <td><?php echo $value->title;  ?></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td><a href="#" title="Edit Class Information"><i class="material-icons">check</i></a></td>
					  <td><a href="#" title="Edit Class Information" data-toggle="modal" data-target="#myModal<?php echo $i;  ?>"><i class="material-icons">mode_edit</i></a></td>
					  <td><a onclick="if(confirm('Are you sure you want to delete?')){return true;} else {return false;}" href="<?php echo base_url().'student/Notes/delete/'.$value->id ?>" title="Edit Class Information"><i class="material-icons">delete</i></a></td>
					</tr>
					<tr id="demo<?php echo $i; ?>" class="collapse">
					  <td colspan="3"><div></div></td>
					
					  <td colspan="4"><?php echo $value->title;  ?></td>
					  <td><?php echo $value->description;  ?></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>					  
					  
					</tr>

<?php $notebook =  get_all_notebook(); ?>
					<div class="modal fade" id="myModal<?php echo $i;  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                        <input type="hidden" name="notes_id" id="notes_id" value="<?php echo $value->id; ?>">
                          <span style="display:none;" id="success_msg_note<?php echo $value->id; ?>" class="alert alert-succes"></span>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Title" id="notes_title<?php echo $value->id; ?>" value="<?php if(!empty($value->title))  echo $value->title;  ?>"  name="notes_title" type="text" autofocus="">
                                <span class="log_error" id="note_title_error<?php echo $value->id; ?>"></span>
                            </div> 
                            <div class="form-group">
                                <select class="form-control" id="note_book_id<?php echo $value->id; ?>">
                                    <option  value=""> - Select NoteBook - </option>
                                    <?php if(!empty($notebook)){ foreach($notebook as $row){ ?>
                                        <option <?php if(!empty($value->notebook_id) && $value->notebook_id==$row->id){ echo 'selected="selected"';} ?> value="<?php echo $row->id; ?>"><?php if(!empty($row->notebook)){ echo ucfirst($row->notebook);  }   ?></option>
                                    <?php } } ?>
                                </select>
                                <span class="log_error" id="note_book_error<?php echo $value->id; ?>"></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="notes_description<?php echo $value->id; ?>"  name="notes_description"  placeholder="Add Description" autofocus=""><?php if(!empty($value->description))  echo $value->description; ?></textarea>
                                 <span class="log_error" id="note_desc_error<?php echo $value->id; ?>"></span>
                            </div>  
                        </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="return get_update_notes(<?php echo $value->id; ?>);" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
				
					  <?php $i++; } }else{  ?>
                  <tr> <td colspan="12"> No Chapetr Found.</td>     </tr>
                  <?php } ?>
				
		
				  </tbody>
				</table>
            </div>

			
			
			
           