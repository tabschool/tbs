    <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header notes-color">My Notes 
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
                <!-- Welcome -->

                <?php if (!empty($notebooks)) { ?> 
                <?php foreach ($notebooks as  $value) {  ?>
                <div class="col-lg-3 col-md-4">
				  <div class="book_bx">
                    <a href="<?php echo base_url('student/Notes/details/'.$value->id); ?>" title=""><img src="<?php echo STUDENT_THEME_URL ?>img/my-notes.png"></a>
				    <h2><?php if(!empty($value->notebook)) echo ucfirst($value->notebook);   ?></h2>
					<p>Publisher: <?php if(!empty(get_student_name())) echo ucfirst(get_student_name());   ?></p>
					
					<a  class="delete_note"  id="btnDelete<?php echo $value->id; ?>" href="javascript:;" data="<?php echo base_url().'student/Notes/delete/'.$value->id ?>"  style="margin-top:10px !Important; margin-bottom:10px !Important;">DELETE</a>
				  </div>
                </div>
				   <?php } } else { ?>
                	 <div>
                	 	
                	 </div>
                <?php } ?>
				
                <!--end  Welcome -->
				
					<!-- add book -->

		 

<!-- end book -->
            </div>

			
