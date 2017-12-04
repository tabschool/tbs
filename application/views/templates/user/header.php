<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabschool | Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo FRONTEND_THEME_URL ?>plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo FRONTEND_THEME_URL ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<!--    <link href="<?php echo FRONTEND_THEME_URL ?>plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />-->
    <link href="<?php echo FRONTEND_THEME_URL ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo FRONTEND_THEME_URL ?>css/main-style.css" rel="stylesheet" />

    <link href="<?php echo FRONTEND_THEME_URL ?>css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo FRONTEND_THEME_URL ?>css/animate.min.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
<!--    <link href="<?php echo FRONTEND_THEME_URL ?>plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="<?php echo FRONTEND_THEME_URL ?>plugins/jquery-1.10.2.js"></script>
   </head>
<body>
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
                                <img src="<?php echo FRONTEND_THEME_URL ?>img/user_main.png" alt="">
                            </div>                            
                            
<div class="btn-group">
    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo user_name() ?> <i class="material-icons">keyboard_arrow_down</i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('profile') ?>"><i class="material-icons">account_circle</i> Profile</a>
        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
        
    </div>
</div>
                        </div>
                        <!--end user image section-->

                    </li>
                  
                <?php if(user_role() == 2): ?>
                   
                    <li class="selected">
                        <a href="<?php echo base_url('institute')?>/dashboard">Dashboard</a>
                    </li>              
                    <li>
                        <a href="<?php echo base_url('institute')?>/teachers">Teachers</a>
                    </li>                   
                    <li>
                        <a href="<?php echo base_url('institute')?>/students">Students</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('institute')?>/courses">Courses</a>
                    </li>
     
                <?php endif; ?>

                <?php if(user_role() == 3): ?>
                   
                    <li class="selected">
                        <a href="<?php echo base_url('teacher')?>/dashboard">Dashboard</a>
                    </li>              
                    <li>
                        <a href="<?php echo base_url('teacher')?>/contents">Contents</a>
                    </li>                   
                    <li>
                        <a href="<?php echo base_url('teacher')?>/student_feeds">Student Feed</a>
                    </li>
                    
     
                <?php endif; ?>

                <?php if(user_role() == 4): ?>
                   
                    <li class="selected">
                        <a href="<?php echo base_url('student')?>/dashboard">Dashboard</a>
                    </li>              
                    <li>
                        <a href="<?php echo base_url('student')?>/class_feeds">Class Feed</a>
                    </li>                   
                    <li>
                        <a href="<?php echo base_url('student')?>/libraries">Library</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student')?>/courses">Courses</a>
                    </li>
     
                <?php endif; ?>     

                        <li>
                                <a href="fee-management.html">Fee Management</a>
                            </li>
                    
                     <li>
                        <a href="login.html">Setting</a>
                    </li>
                    <li>
                        <a href="login.html">Helpdesk</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>">Tabschool</a>
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
                                <img src="<?php echo FRONTEND_THEME_URL ?>img/user_main.png" alt="">
                            </div>                            
                            
<div class="btn-group">
    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php echo user_name() ?> <i class="material-icons">keyboard_arrow_down</i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('profile') ?>"><i class="material-icons">account_circle</i> Profile</a>
        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
    </div>
</div>
                        </div>
                        <!--end user image section-->

                    </li>

        <?php if(user_role() == 2): ?>
                   <li class="selected">
                        <a href="<?php base_url('institute')?>/deshbord">Dashboard</a>
                    </li>              
            <li>
                        <a href="<?php base_url('institute')?>/teachers">Teachers</a>
                    </li>                   
            <li>
                        <a href="<?php base_url('institute')?>/students">Students</a>
                    </li>
            <li>
                        <a href="<?php base_url('institute')?>/courses">Courses</a>
                    </li>
                    <li>
                        <a href="fee-management.html">Fee Management</a>
                    </li>
        <?php endif; ?>     
                     <li>
                        <a href="login.html">Setting</a>
                    </li>
                    <li>
                        <a href="login.html">Helpdesk</a>
                    </li>
                    <li>
                        <a href="login.html">Tabschool</a>
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
               
                
                </li>
            </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

<?php  //echo msg_alert_backend(); ?>
