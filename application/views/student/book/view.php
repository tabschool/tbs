             <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">MY BOOKS - <?php if(!empty($mybook->book_name)) echo ucfirst($mybook->book_name);  ?> 
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
            <div class="col-md-12">	
<!--			
				<div class="login-panel panel panel-default ">                  
                   <div class="panel-body chapter">
				   <ul>
				   <li>
				   <h4>Name: <?php if(!empty($mybook->book_name)) echo ucfirst($mybook->book_name);  ?></h4>
				   <p>Author : <?php if(!empty($mybook->author)) echo ucfirst($mybook->author);  ?></p>
				   </li>
				   <li><i class="material-icons"  data-toggle="modal" data-target="#myModal4">bookmark_border</i></li>
				   </ul>
                </div>
                </div>-->
				
                <div class="login-panel panel panel-default">    

                    <embed src="<?php if(!empty($mybook->path)) echo  base_url(str_replace('./','',$mybook->path)); ?>" width="100%" height="700px" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
                    
                </div>	
				
            </div>
			<!-- <div class="col-md-4">	
			<div class=" panel installment">                  
                   <div class="panel-body chaper-right">
				   <ul>
				   <li>Chapter 1 - Business Communication</li>
				   <li>Chapter 2 - Business Communication</li>
				   <li>Chapter 3 - Business Communication</li>
				   <li>Chapter 4 - Business Communication</li>
				   <li>Chapter 5 - Business Communication</li>
				   <li>Chapter 6 - Business Communication</li>
				   <li>Chapter 7 - Business Communication</li>
				   <li>Chapter 8 - Business Communication</li>
				   <li>Chapter 9 - Business Communication</li>
				   <li>Chapter 10 - Business Communication</li>
				   <li>Chapter 11 - Business Communication</li>
				   <li>Chapter 12 - Business Communication</li>
				   <li>Chapter 13 - Business Communication</li>
				   <li>Chapter 14 - Business Communication</li>
				   <li>Chapter 15 - Business Communication</li>
                </div> -->
                </div>
			</div>
			
				<!-- add book -->
