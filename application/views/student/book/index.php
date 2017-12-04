<div class="col-lg-12">
                    <h1 class="page-header">My Books 
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
    <?php if (!empty($mybooks)){ foreach ($mybooks as $row) {  ?>
    <?php $book_info = get_book_infomation($row->book_id); ?>
    
    <div class="col-md-3 col-sm-4">
	  <div class="book_bx">
        <a href="<?php echo base_url('student/Mybooks/read/'.$book_info->id.'_mybook'); ?>"><img src="<?php echo base_url() ?>assets/student/img/book.png"></a>
	    <a href="<?php echo base_url('student/Mybooks/read/'.$book_info->id.'_mybook'); ?>"> <h2 class="notes-margin"><?php if(!empty($book_info->book_name)) echo ucfirst($book_info->book_name); ?></h2></a>
		<p><a href="#">Publisher:<?php if(!empty($book_info->publisher_name)) echo ucfirst($book_info->publisher_name); ?></a></p>
	  </div>
    </div>
     
    <?php } } else {  ?>

    <div class="alert alert-info">
	<div class="custom-alerts">
		<img src="<?php echo base_url('assets/frontend/'); ?> img/sad.png" alt="Oops!! Sorry!!">
		<h3 class="new-margin">Sorry!! We are unable to find any books related to this topic </h3>
		<h4 class="new-margin">Go to Library and Add books to view your books</h4>
		
	</div>
    </div>
      
    <?php }  ?>
	
    <!--end  Welcome -->
	