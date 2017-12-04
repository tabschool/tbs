      <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> </h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row"> 
			<div id="main_profile" class="col-lg-12 banner">
			<div class="profile">
			<p>
			<?php if(!empty(get_user_Image_info())){ ?>
                                <img  src="<?php echo get_user_Image_info(); ?>" alt="">
                            <?php }else{ ?>
                                <img src="<?php echo base_url('assets/frontend/'); ?>img/default-profile-pic.png" alt="">
                            <?php } ?>
			</p>
			
			<p>
			<i class="material-icons">camera_alt</i>
			<b><?php echo ucfirst(get_student_name()); ?></b>
			<span><?php echo get_course_name($user_info->course_id); ?><br/> <?php echo get_institute_name($user_info->parent_id); ?></span>
				<?php if(!empty($user_info->qoute)){ echo $user_info->qoute; }else{ echo 'Hey!! Welcome to Tabschool, Tell something about yourself to your friends, colleagues or teachers. If not, write a motto to inspire others..'; } ?></p>
			
			</div>
			<i class="material-icons">edit</i>
			</div>
			
			<div class="col-lg-12 banner-bottom">
			<!--
			<ul>
			<li><a href="#">Replies </a></li>
			<li><a href="#">Following </a></li>
			<li><a href="#">Followers </a></li>
			</ul>-->
			</div>
			
			<div class="col-md-4 intro">
			<?php if (!empty($user_info->course_view)): ?>
			<p><i class="material-icons">school</i> <?php echo get_course_name($user_info->course_id); ?><br/> <?php echo get_institute_name($user_info->parent_id); ?></p>
			<?php endif; ?>
			<?php if (!empty($user_info->birthday_view)): ?>
			<p><i class="material-icons">cake</i> <?php if(!empty($user_info->birthday)) echo  date('d M Y',strtotime($user_info->birthday)); ?></p>
			<?php endif; ?>
			<?php if (!empty($user_info->gender_view)): ?>
			<p><i class="material-icons">person_outline</i> <?php if(!empty($user_info->sex)) echo ucfirst($user_info->sex); ?></p>
			<?php endif;?>
			<?php if (!empty($user_info->address_view)): ?>
			<p><i class="material-icons">place</i><?php if(!empty($user_info->address)) echo ucfirst($user_info->address); ?></p>
			<?php endif; ?>
			<?php if(!empty($user_info->city_view)): ?>
			<p><i class="material-icons">City</i><?php if(!empty($user_info->city)) echo ucfirst($user_info->city); ?></p>
			<?php endif; ?>
			<?php if(!empty($user_info->parents_view)): ?>
			<p><i class="material-icons">child_care</i> Father's Name : <?php if(!empty($user_info->fatherName)) echo ucfirst($user_info->fatherName); ?> <br/>Mother's Name : <?php if(!empty($user_info->motherName)) echo ucfirst($user_info->motherName); ?></p>
			<?php endif; ?>
			</div>
            <div class="col-md-8">
				<div class="profile-panel align-center">
					<div class="row">
					<div class="col-lg-12">
						<img src="<?php echo base_url('assets/student/'); ?>img/locked.png" alt="Somethings New">
						<h3>Something exciting is coming here soon!!</h3>
						<h4>Keep coming back</h4>
					</div>
					</div>
				</div>
				<!--
				<div class="raply">
				<div class="login-panel panel panel-default "> 
				 <div class="panel-body">				
				<div class="img-round">
                  <img src="<?php echo base_url('assets/frontend/'); ?>img/user.png" alt="" align="left">
                </div>
				 <p><span>ARCHIE ANDREWS</span>1 min ago </p>
				 <div class="btn-group">
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Edit</a>
        <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Delete</a>       
    </div>
</div>
				 <p>Does anyone have a Business Communication Notes?</p>
                </div>
                </div>
				<ul>
				<li><i class="material-icons">reply</i></li>
				<li><i class="material-icons">favorite_border</i>	</li>
				</ul>
                </div>
				
				<div class="raply">
				<div class="login-panel panel panel-default "> 
				 <div class="panel-body">				
				<div class="img-round">
                  <img src="<?php echo base_url('assets/frontend/'); ?>img/user.png" alt="" align="left">
                </div>
				 <p><span>ARCHIE ANDREWS</span>1 min ago </p>
				 <div class="btn-group">
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Edit</a>
        <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Delete</a>       
    </div>
</div>
				 <p>Does anyone have a Business Communication Notes?</p>
                </div>
                </div>
				<ul>
				<li><i class="material-icons">reply</i></li>
				<li><i class="material-icons">favorite_border</i>	</li>
				</ul>
                </div>
				
				<div class="raply">
				<div class="login-panel panel panel-default "> 
				 <div class="panel-body">				
				<div class="img-round">
                  <img src="<?php echo base_url('assets/frontend/'); ?>img/user.png" alt="" align="left">
                </div>
				 <p><span>ARCHIE ANDREWS</span>1 min ago </p>
				 <div class="btn-group">
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Edit</a>
        <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Delete</a>       
    </div>
</div>
				 <p>Does anyone have a Business Communication Notes?</p>
                </div>
                </div>
				<ul>
				<li><i class="material-icons">reply</i></li>
				<li><i class="material-icons">favorite_border</i>	</li>
				</ul>
                </div>
			</div>	
        </div>
-->			 