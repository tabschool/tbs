    <!-- end navbar top -->
                <!-- Page Header -->
                <div class="col-lg-12">
                    <div class="page-header"> 

<div id="exTab2" class="container">	
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">LIBRARY</a>
			</li>
			<li><a href="#2" data-toggle="tab">MY BOOKS</a>
			</li>
			<li><a href="#3" data-toggle="tab">MY NOTES</a>
			</li>
			<li><a href="#4" data-toggle="tab">CLASSFEED</a>
			</li>
			
		</ul>

  </div>
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
</div>
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
						<div class="tab-content">
						
						<div class="tab-pane active library" id="1">
           <!-- Welcome -->
                 <?php if (!empty($books)) { ?> 
                <?php foreach ($books as  $value) {  ?>
	               
	                <div class="col-md-4">
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
                	<div class="custom-alerts">
					<img src="<?php echo base_url('assets/student/'); ?>img/sad.png" alt="Oops!! Sorry!!">
					<h3 class="new-margin">Sorry!! We are unable to find any books </h3>
					<h4 class="new-margin">Please Go to Helpdesk to request more books</h4>
					<h5 class="new-margin">We're always ready to serve you</h5>
				</div>
                </div>
                <?php } ?>
			
                <!--end  Welcome -->
				</div>
						
			  <div class="tab-pane" id="2">
           <!-- Welcome -->
            
                 <?php if (!empty($mybooks)){ foreach ($mybooks as $row) {  ?>
    <?php $book_info = get_book_infomation($row->book_id); ?>
    
    <div class="col-md-3 col-sm-4">
	  <div class="book_bx">
        <a href="<?php echo base_url('student/Mybooks/read/'.$book_info->id.'_mybook'); ?>"><img src="<?php echo base_url() ?>assets/student/img/book.png"></a>
	    <a href="<?php echo base_url('student/Mybooks/read/'.$book_info->id.'_mybook'); ?>"> <h2><?php if(!empty($book_info->book_name)) echo ucfirst($book_info->book_name); ?></h2></a>
		<p><a href="#">Publisher:<?php if(!empty($book_info->publisher_name)) echo ucfirst($book_info->publisher_name); ?></a></p>
	  </div>
    </div>
     
    <?php } } else {  ?>

    <div class="alert alert-info">
    	<div class="custom-alerts">
					<img src="<?php echo base_url('assets/student/'); ?>img/sad.png" alt="Oops!! Sorry!!">
					<h3 class="new-margin">Sorry!! You don't have books of this topic</h3>
					<h4 class="new-margin">Go to Library and Add books of this topic</h4>
					
		</div>
    </div>
      
    <?php }  ?>
				
                <!--end  Welcome -->
				</div>
				
        <div class="tab-pane my-notes" id="3">
          <!-- Welcome -->
               <?php if (!empty($mynotes)) { ?> 
                <?php foreach ($mynotes as  $value) {  ?>
                <div class="col-lg-3 ">
				  <div class="book_bx">
                    <img src="<?php echo STUDENT_THEME_URL ?>img/my-notes.png">
				    <h2><?php if(!empty($value->title)) echo ucfirst($value->title);   ?></h2>
					<p>Publisher: <?php if(!empty(get_student_name())) echo ucfirst(get_student_name());   ?></p>
					<a href="#" data-toggle="modal" data-target="#myModal4">SHARE</a>
					<a  onclick="if(confirm('Are you sure you want to delete?')){return true;} else {return false;}" href="<?php echo base_url().'student/Notes/delete/'.$value->id ?>">DELETE</a>
				  </div>
                </div>
				<?php } } else { ?>
            	    <div class="alert alert-info">
				    	<div class="custom-alerts">
						<img src="<?php echo base_url('assets/student/'); ?>img/sad.png" alt="Oops!! Sorry!!">
						<h3 class="new-margin">Sorry!! You have not made any notes regarding this topic </h3>
						<h4 class="new-margin">Start making notes on this topic</h4>
						</div>
				    </div>
                <?php } ?>
				
                <!--end  Welcome -->
				</div>
				<div class="tab-pane classfeed profiles" id="4">
				
				<div class="col-md-8">

				 <?php if(!empty($classfeeds)){  foreach($classfeeds as $value){ ?>
				<?php $teacher_info = get_teacher_info($value->user_id); ?>
			    <div class="raply assiment">
						<div class="login-panel panel panel-default "> 
						 <div class="panel-body">				
						<div class="img-round">
						<?php if (!empty($teacher_info->coverImage)): ?>
		                    <img src="<?php echo $teacher_info->coverImage; ?>" alt="" align="left">
						<?php else: ?>
		                    <img src="<?php echo STUDENT_THEME_URL ?>img/ntra.png" alt="" align="left">
						<?php endif; ?>
		                </div>
						 <p><span> <?php  if (!empty($teacher_info->first_name)){ echo ucfirst($teacher_info->first_name.' '.$teacher_info->last_name); } ?> </span> 
						 <?php /*$post_date = strtotime($value->created_at); $now = time(); echo timespan($post_date, $now);*/  echo time_elapsed_string($value->created_at, true); ?> </p>
						 <p> <?php echo $value->title;  ?> </p>
						 <a href="<?php echo base_url('student/classfeed/view_feed/'.$value->id); ?>" class="btn btn-1 btn-1c">Complete Assignment!</a>
		                </div>
		                </div>
                </div>
				<?php } }else{  ?>
          <div class="alert alert-info"> 
			<div class="custom-alerts">
						<img src="<?php echo base_url('assets/student/'); ?>img/sad.png" alt="Oops!! Sorry!!">
						<h3 class="new-margin">Sorry!! We could not find any feeds regarding this</h3>
						
						</div>
		  </div>
          <?php } ?>
					
			</div>
           	
				</div> 
				<!--
				<div class="tab-pane panel" id="5">
          <h2>Principles of Marketing</h2>
		  
		  <p>Welcome to Principles of marketing, made up of many business majors.</p>

<p>Marketing is defined as "the total of activities involved in the transfer of goods from the producer or seller to the consumer or buyer, including advertising, shipping, storing, and selling."</p>

<p>An alternate definition is paraphrased from memory of an introductory business text is: Marketing is all activities conducted to prepare for sales. Sales is all activities required to close the deal. Shipping and customer satisfaction would be included in sales to avoid the customer from reversing or unclosing the deal.</p>

<p>Thus Marketing can be categorized as a branch of business as well as a social science. We buy goods (thus becoming the buyer/consumer) from a vendor (or producer/seller), creating a transaction. In the past, marketing involved traveling salesmen, while in modern times, marketing is more likely to involve television, the internet, and other forms of media bombardment.</p>

<p>As we progress in this age of technology it is vital for us to understand marketing and its place in the world. Understanding and applying the principles will be beneficial to the businessperson and the layperson.</p>
				</div> 
				
				<div class="tab-pane courses" id="6">
				
          <!-- Welcome 
                <div class="col-md-4">
				  <div class="book_bx">
                   <div class="course-name">
                    <img src="assets/img/course.png">
					<p>Learn C++ Programming </p>
					</div>
				    <p>Publisher: ExamFear <span>Year:2016</span></p>
					<a href="#">Rs. 4000</a>
				  </div>
                </div>
				 
				</div>
			</div>
               
            </div>
-->
			
			
	