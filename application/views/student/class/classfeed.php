	
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> </h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row"> 
            <div class="col-md-8">	

                 <?php if(!empty($classfeeds)){  foreach($classfeeds as $value){ ?>
                <div class="raply assiment">
        				<div class="login-panel panel panel-default "> 
        				     <div class="panel-body">
                             <?php $teacher_info = get_teacher_info($value->user_id);   ?>	
                        			
        				<div class="img-round">
                          <?php if(!empty($teacher_info->coverImage)){ ?>
                                <img src="<?php echo $teacher_info->coverImage; ?>" alt="">
                            <?php }else{ ?>
                                <img  src="<?php echo base_url('assets/frontend/'); ?>img/teacher-200.png" alt="">
                            <?php } ?>
                        </div>
        				 <p> <span> <?php if(!empty($teacher_info->first_name)) echo  ucfirst($teacher_info->first_name); ?> <?php if(!empty($teacher_info->last_name)) echo  ucfirst($teacher_info->last_name); ?></span><?php echo feed_time(date('m/d/Y',strtotime($value->created_at)));  ?></p>
                         
        				 <p> <?php if(!empty($value->title)) echo ucfirst($value->title);  ?></p>
        				 <a href="<?php echo base_url('student/classfeed/view_feed/'.$value->id);      ?>" class="btn btn-1 btn-1c">Complete Assignment!</a>
                        </div>
                        </div>
                </div>
                <?php } }else{  ?>
                    <p class="alert alert-info">
                        No Feed Found.
                    </p>
                <?php } ?>
            
			</div>	
			<div class="col-md-4">	
			
			</div>
        </div>

			
			
			
            <div class="row">            
				   
             </div>
			 
		 
                            
        <!-- end page-wrapper -->