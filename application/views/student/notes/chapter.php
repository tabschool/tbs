            <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">MY NOTES 
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

<?php if (!empty($notes)) { ?> 
				  <?php $i=0; foreach ($notes as  $value) {  ?>	

<!-- end book -->
<div class="chap-wrapper">
	<div class="chap-panel" data-toggle="collapse" data-target="#test<?php echo $i; ?>">	
		<div class="col-lg-2">
			<h5><?php echo date('d M',strtotime($value->create_at)) ; ?>   </h5>
			<h3><?php echo date('Y',strtotime($value->create_at)) ; ?></h3>
		</div>
		
		<div class="col-lg-2 col-sm-1 align-middle">
			<h4><?php echo date('H:i:A',strtotime($value->create_at)) ?> </h4>
		</div>
		<div class="col-lg-5 align-middle">
				<p><?php echo $value->title;  ?></p>
		</div>
		<div class="col-lg-1 icon-align"><a href="#"><i class="material-icons grey">expand_more</i></a></div>
		<div class="col-lg-1 icon-align"><a data-toggle="modal" data-target="#EditModal<?php echo $i;  ?>" href="javascript:;"><i class="material-icons grey">mode_edit</i></a></div>
		<div class="col-lg-1 icon-align"><a class="delete_chapternote" id="chapternote<?php echo  $value->id; ?>" href="javascript:;" data="<?php echo base_url().'student/Notes/chapter_delete/'.$value->notebook_id.'/'.$value->id ?>" title="Edit Class Information"><i class="material-icons">delete</i></a></div>	
	</div>
	<div id="test<?php echo $i; ?>" class="collapse">
		<div class="chap-drop-panel">
			<div class="row">
				<div class="col-lg-12">
					<p><?php echo $value->description;  ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $notebook =  get_all_notebook(); ?>
					<div class="modal fade" id="EditModal<?php echo $i;  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <button type="button" onclick="return get_update_notes(<?php echo $value->id; ?>);" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div> 	


<?php $i++; } }else{  ?>
             <div class="alert alert-info">
              	
<p> Sorry!! No Chapters Found.  </p>
              </div> 
<?php } ?>

<!-- <div class="chap-wrapper">
<div class="chap-panel" data-toggle="collapse" data-target="#demotest">	
	<div class="col-lg-2">
		<h5>28th Nov</h5>
		<h3>2017</h3>
	</div>
	
	<div class="col-lg-2 col-sm-1 align-middle">
		<h4>11:43 AM</h4>
	</div>
	<div class="col-lg-5 align-middle">
	<p><?php //echo $value->title;  ?></p>
	</div>
	<div class="col-lg-1 icon-align"><a href="#"><i class="material-icons grey">expand_more</i></a></div>
	<div class="col-lg-1 icon-align"><a href="#"><i class="material-icons grey">mode_edit</i></a></div>
	<div class="col-lg-1 icon-align"><a href="#"><i class="material-icons grey">delete</i></a></div>	
</div>
	<div id="demotest" class="collapse">
		<div class="chap-drop-panel">
			<div class="row">
			<div class="col-lg-12">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. </p>
			</div>
			</div>
		</div>
	</div>
</div>
 -->

            </div>

			
			
			
           