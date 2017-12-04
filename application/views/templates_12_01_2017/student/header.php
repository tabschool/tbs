<?php 

    $segment2 = $this->uri->segment(2);
    $segment3 = $segment2."/".$this->uri->segment(3);
    if($segment2 == 'dashboard' || $segment2 == '') $dashboard = 'active'; else $dashboard = '';
    if($segment2 == 'Classfeed' || $segment3 == 'Classfeed/view' || $segment3 == 'Classfeed/edit') $feed = 'active'; else $feed  = '';
    if($segment2 == 'Libraries' || $segment3 == 'Libraries/add' || $segment3 == 'Libraries/view') $library = 'active'; else $library = '';
    if($segment2 == 'Tasks' || $segment3 == 'Tasks/add' || $segment3 == 'tasks/edit') $task = 'active'; else $task = '';
    if($segment2 == 'Notes' || $segment3 == 'Notes/add' || $segment3 == 'Notes/edit') $note = 'active'; else $note = '';
    if($segment2 == 'Search' || $segment3 == 'Search/index'){  $search='search'; }else{ $search = '';  }
    if($segment2 == 'Notes' && $segment3 == 'Notes/details' ){ $task = ''; $task_chapter = 'active';   }else{ $task_chapter = ''; }
    if($segment2 == 'Profile' || $segment3 == 'Profile/setting' ){ $profile = 'active';   }else{ $profile = ''; }

    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabschool | Student Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo STUDENT_THEME_URL ?>plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo STUDENT_THEME_URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo STUDENT_THEME_URL ?>plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo STUDENT_THEME_URL ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo STUDENT_THEME_URL ?>css/main-style.css" rel="stylesheet" />
    <link href="<?php echo STUDENT_THEME_URL ?>css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo TEACHER_THEME_URL ?>css/jquery-ui.css" />
    <!-- Page-Level CSS -->
    <link href="<?php echo STUDENT_THEME_URL ?>plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 
    <?php if(!empty($feed)): ?>
                <link rel='stylesheet' id='h5p-core-styles-h5p-css'  href='http://localhost/tabschool/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p.css?ver=1.9.4' type='text/css' media='all' />
                <link rel='stylesheet' id='h5p-core-styles-h5p-confirmation-dialog-css'  href='http://localhost/tabschool/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-confirmation-dialog.css?ver=1.9.4' type='text/css' media='all' />
                <link rel='stylesheet' id='h5p-core-styles-h5p-core-button-css'  href='http://localhost/tabschool/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-core-button.css?ver=1.9.4' type='text/css' media='all' />
    <?php endif ?>
<style type="text/css">.log_error{color:red;}.ui-datepicker td {padding: 1px !important;}</style>
   </head>
<body class="<?php  if(!empty($feed)){ echo 'classfeed';  }else if(!empty($task_chapter)){ echo 'chapter'; }else if(!empty($profile)){ echo 'classfeed profiles'; }else if(!empty($search)){ echo 'search'; }else if(!empty($note)){ echo 'my-notes'; }else if(!empty($task)){ echo 'task'; }else if(!empty($library)){ echo 'library'; } ?>">
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
                            <?php if(!empty(get_user_Image_info())){ ?>
                                <img src="<?php echo get_user_Image_info(); ?>" alt="">
                            <?php }else{ ?>
                                <img src="<?php echo base_url('assets/frontend/'); ?>img/default-profile-pic.png" alt="">
                            <?php } ?>
                            </div>                            
                            
                            <div class="btn-group">
                                <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php echo ucfirst(get_student_name()); ?> <i class="material-icons">keyboard_arrow_down</i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('student/Profile/'); ?>"><i class="material-icons">account_circle</i> Profile</a>
                                   <a class="dropdown-item" href="<?php echo base_url('auth/logout/');    ?>"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->

                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Classfeed/')  ?>"> Classfeed </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Mybooks/')  ?>">My books</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Notes/')  ?>">My notes</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Tasks/')  ?>">Tasks</a>
                    </li>
                    <li class="selected">
                        <a href="<?php echo base_url('student/Libraries/')  ?>">Library</a>
                    </li>
                    <li>
                        <a href="#">Wikiversity</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('student/courses/'); ?>">Courses</a>
                    </li>
                    <li>
                        <a href="#">Pay fee</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Profile/setting'); ?>">Setting</a>
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
                                <?php if(!empty(get_user_Image_info())){ ?>
                                <img src="<?php echo get_user_Image_info(); ?>" alt="">
                            <?php }else{ ?>
                                <img src="<?php echo base_url('assets/frontend/'); ?>img/default-profile-pic.png" alt="">
                            <?php } ?>
                            </div>                            
                            
                            <div class="btn-group">
                                <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo ucfirst(get_student_name()); ?> <i class="material-icons">keyboard_arrow_down</i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('student/Profile/setting'); ?>"><i class="material-icons">account_circle</i> Profile</a>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/logout/');    ?>"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->

                    </li>
                    <li>
                        <a href="<?php echo base_url('student/classfeed/')  ?>"> Classfeed </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/Mybooks/')  ?>">My books</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('student/Notes/')  ?>">My notes</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('student/Tasks/')  ?>">Tasks</a>
                    </li>
                    <li class="selected">
                        <a href="<?php echo base_url('student/Libraries/')  ?>">Library</a>
                    </li>
                     <li>
                        <a href="#">Wikiversity</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('student/courses/'); ?>">Courses</a>
                    </li>
                     <li>
                        <a href="#">Pay fee</a>
                    </li>
                    
                     <li>
                        <a href="<?php echo base_url('student/Profile/setting');    ?>">Setting</a>
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
            <form action="<?php echo base_url('student/Search/');?>" method="post" accept-charset="utf-8">
                <ul class="nav navbar-top-links navbar-left">
                    <li><input type="text" name="search" value="<?php  if(isset($_POST['search']) && !empty($_POST['search'])){ echo  $_POST['search'];   }?>" placeholder="Search"> <button   type="submit" name="search_submit">Submit</button> <i class="material-icons">search</i></li><!--  -->
                </ul>
            </form>
             
            
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->                        
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <label  style="margin-top:0px;" id="label-count" class="label label-danger pull-right"></label>
                        <i class="material-icons">notifications</i> 
                        
                    </a>
                    <!-- dropdown user-->
                 <ul id="notification" class="dropdown-menu dropdown-alerts">
 
                </li>
            </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>

        <!-- end navbar top -->
            
