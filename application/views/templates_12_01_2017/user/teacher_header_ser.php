<?php 
 
    $segment2 = $this->uri->segment(2);
    $segment3 = $segment2."/".$this->uri->segment(3);
    if($segment2 == 'dashboard' || $segment2 == '') $dashboard = 'active'; else $dashboard = '';
    if($segment2 == 'contents' || $segment3 == 'contents/add' || $segment3 == 'contents/edit') $user = 'active'; else $user = '';
    if($segment2 == 'email_templates' || $segment3 == 'email_templates/add' || $segment3 == 'email_templates/edit' ||  $segment3 == 'email_templates/view') $email_templates = 'active'; else $email_templates = '';
    if($segment2 == 'contents' && $segment3 == 'contents/' ) $head='task'; else $head='';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabschool| Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo TEACHER_THEME_URL ?>plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo TEACHER_THEME_URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo TEACHER_THEME_URL ?>plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo TEACHER_THEME_URL ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo TEACHER_THEME_URL ?>css/main-style.css" rel="stylesheet" />
	<link href="<?php echo TEACHER_THEME_URL ?>css/animate.min.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo TEACHER_THEME_URL ?>plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo TEACHER_THEME_URL ?>css/jquery-ui.css" />

   <link rel='stylesheet' id='h5p-core-styles-h5p-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p.css?ver=1.9.4' type='text/css' media='all' />
<link rel='stylesheet' id='h5p-core-styles-h5p-confirmation-dialog-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-confirmation-dialog.css?ver=1.9.4' type='text/css' media='all' />
<link rel='stylesheet' id='h5p-core-styles-h5p-core-button-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-core-button.css?ver=1.9.4' type='text/css' media='all' />
 <style type="text/css">
        /*#h5p-content-form {
            padding-top: 10px;
            margin-right: 0px;
        }*/
    </style>
   </head>
<body class="<?php if(!empty($head)){  ?>  task <?php }else{ ?> pay-fee  <?php } ?>">
    <!--  wrapper -->
    <div id="wrapper">
             <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo TEACHER_THEME_URL ?>img/user_main.png" alt="">
                            </div>                            
							
                                <div class="btn-group">
                                    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Mr. Weatherbee <i class="material-icons"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><i class="material-icons"></i><span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Profile</a>
                                        <a class="dropdown-item" href="<?php echo base_url('auth/logout/');    ?>"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
                                    </div>
                                </div>
                        </div>
                        <!--end user image section-->

                    </li>
                    <li>
                        <a href="<?php echo base_url('teacher/dashboard/') ?>">Dashboard</a>
                    </li>
					
					<li class="selected">
                        <a href="<?php echo base_url('teacher/contents/add') ?>">Create Content</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('teacher/contents/') ?>">Saved Content</a>
                    </li>
					
					<li>
                        <a href="#">Result Analytics</a>
                    </li>
					
                    <li>
                        <a href="#"> Student Feed </a>
                    </li>
					
					 <li>
                        <a href="#">Setting</a>
                    </li>
					<li>
                        <a href="#">Helpdesk</a>
                    </li>
					<li>
                        <a href="#">Tabschool</a>
                    </li>
						
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
		
		 
        <div id="page-wrapper">

            <div class="row">
			
			<!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                	<a href="#menu" id="toggle"><span></span></a>

                        <div id="menu">
                          <ul class="nav" id="side-menu">
                            <li>
                                                <!-- user image section-->
                        <div class="user-section">
                        <div class="user-section-inner">
                            <img src="<?php echo TEACHER_THEME_URL ?>img/user_main.png" alt="">
                        </div>                            
                        							
                        <div class="btn-group">
                            <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mr. Weatherbee <i class="material-icons">keyboard_arrow_down</i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="material-icons">account_circle</i> Profile</a>
                                <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
                            </div>
                        </div>
                        </div>
                        <!--end user image section-->

                    </li>
                   <li>
                        <a href="<?php echo base_url('teacher/dashboard/') ?>">Dashboard</a>
                    </li>
					
					<li class="selected">
                        <a href="<?php echo base_url('teacher/contents/add') ?>">Create Content</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('teacher/contents/') ?>">Saved Content</a>
                    </li>
					
					<li>
                        <a href="#">Result Analytics</a>
                    </li>
					
                    <li>
                        <a href="#"> Student Feed </a>
                    </li>
					
					 <li>
                        <a href="#">Setting</a>
                    </li>
					<li>
                        <a href="#">Helpdesk</a>
                    </li>
					<li>
                        <a href="#">Tabschool</a>
                    </li>
  </ul>
</div>
                <a class="navbar-brand">
                </a>
            </div>
            <!-- end navbar-header -->
			 <ul class="nav navbar-top-links navbar-left">
			   <li><input type="search" placeholder="Search"><i class="material-icons">search</i></li>
			 </ul>
			
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
               
                                         
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="material-icons">notifications</i>
                    </a>
                    <!-- dropdown user-->
          <ul class="dropdown-menu dropdown-alerts">
             <li><a href="#"><i class="material-icons">event</i>Your task examination at 4PM is next on your list </a> </li> 
			 <li><a href="#"><i class="material-icons">event</i>Your Friend Veronica Lodge has shared notes with you  </a></li> 
			 <li><a href="#"><i class="material-icons">event</i>You have been added to Exams r Near study group by Chuck Jones</a></li>              
			 <li><a href="#"><i class="material-icons">event</i>Your Teacher Ms. Gurandy has sent you assignment  </a></li>              
			 <li><a href="#"><i class="material-icons">event</i>Your Teacher Ms. Antra has sent you assignment which needs to be completed by 3PM today.  </a></li>              
               
        
            </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->
			