
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Library 
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
                <?php if (!empty($libraries)) { ?> 
                <?php foreach ($libraries as  $value) {  ?>
	               
	                <div class="col-md-4 col-sm-6">
	                  <input type="hidden" id="book_id_<?php echo $value->id;  ?>"  name="" value="<?php echo $value->id;  ?>">
					  <div class="book_bx">
	                    <img src="<?php echo base_url(); ?>assets/student/img/book.png">
					    <h2><?php  if(!empty($value->book_name)){  echo  ucfirst($value->book_name); } ?></h2>
						<p><?php  if(!empty($value->description)){  echo word_limiter(ucfirst($value->description),15); } ?><p>
						<a href="javascript:;">Publisher: <?php  if(!empty($value->publisher_name)){  echo  ucfirst($value->publisher_name); } ?></a> <span>Year: <?php if(!empty($value->pub_year)){  echo  ucfirst($value->pub_year); }  ?></span></p>
						<?php if(!get_this_book_status($value->id)): ?>
						 <a id="book_add_<?php echo $value->id;  ?>" class="class_add_my_book"   href="javascript:;">ADD TO MY BOOKS</a>	
						<?php else: ?>
						 <a onclick="alert('Allready add in your book');" href="javascript:;">ADD TO MY BOOKS</a>	
						<?php endif; ?>
					  </div>
	                </div>
                	 
                <?php } } else { ?>
                <div class="alert alert-info">
                	
                </div>
                	 <h2>No Book Found</h2>
                <?php } ?>
				 
                <!--end  Welcome -->
				
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
            </div>

			
			
