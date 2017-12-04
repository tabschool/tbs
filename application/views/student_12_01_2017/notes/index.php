    <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">My Notes 
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
                <!-- Welcome -->

                <?php if (!empty($notebooks)) { ?> 
                <?php foreach ($notebooks as  $value) {  ?>
                <div class="col-lg-3 col-md-4">
				  <div class="book_bx">
                    <a href="<?php echo base_url('student/Notes/details/'.$value->id); ?>" title=""><img src="<?php echo STUDENT_THEME_URL ?>img/my-notes.png"></a>
				    <h2><?php if(!empty($value->notebook)) echo ucfirst($value->notebook);   ?></h2>
					<p>Publisher: <?php if(!empty(get_student_name())) echo ucfirst(get_student_name());   ?></p>
					<a href="#" data-toggle="modal" data-target="#myModal4">SHARE</a>
					<a  onclick="if(confirm('Are you sure you want to delete?')){return true;} else {return false;}" href="<?php echo base_url().'student/Notes/delete/'.$value->id ?>">DELETE</a>
				  </div>
                </div>
				   <?php } } else { ?>
                	 <div>
                	 	
                	 </div>
                <?php } ?>
				
                <!--end  Welcome -->
				
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
            </div>

			
