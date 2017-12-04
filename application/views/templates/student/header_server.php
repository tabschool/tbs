<?php 

    $segment2 = $this->uri->segment(2);
    $segment3 = $segment2."/".$this->uri->segment(3);
    if($segment2 == 'dashboard' || $segment2 == '') $dashboard = 'active'; else $dashboard = '';
    if($segment2 == 'classfeed' || $segment3 == 'classfeed/view' || $segment3 == 'classfeed/edit') $feed = 'active'; else $feed  = '';
    if($segment2 == 'library' || $segment3 == 'library/add' || $segment3 == 'library/view') $library = 'active'; else $library = '';
    if($segment2 == 'tasks' || $segment3 == 'tasks/add' || $segment3 == 'tasks/edit') $task = 'active'; else $task = '';
    if($segment2 == 'notes' || $segment3 == 'notes/add' || $segment3 == 'notes/edit') $note = 'active'; else $note = '';

?>
library
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
    <!-- Page-Level CSS -->
    <link href="<?php echo STUDENT_THEME_URL ?>plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php if (!empty($feed)): ?>
          <link rel='stylesheet' id='h5p-core-styles-h5p-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p.css?ver=1.9.4' type='text/css' media='all' />
          <link rel='stylesheet' id='h5p-core-styles-h5p-confirmation-dialog-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-confirmation-dialog.css?ver=1.9.4' type='text/css' media='all' />
          <link rel='stylesheet' id='h5p-core-styles-h5p-core-button-css'  href='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/styles/h5p-core-button.css?ver=1.9.4' type='text/css' media='all' />
    <?php endif ?>
   </head>
   <body class="<?php if (!empty($feed)){ echo 'task';  }else if(!empty($note)){ echo 'my-notes'; }else if(!empty($task)){ echo 'task'; }else if(!empty($library)){ echo 'library'; } ?>">
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
                                <img src="<?php echo STUDENT_THEME_URL ?>img/user.png" alt="">
                            </div>                            
                            
                            <div class="btn-group">
                                <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Archie Andrews <i class="material-icons">keyboard_arrow_down</i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.html"><i class="material-icons">account_circle</i> Profile</a>
                                    <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->

                    </li>
                    <li>
                        <a href="<?php echo  base_url('student/classfeed/')  ?>"> Classfeed </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/books/')  ?>">My books</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/notes/')  ?>">My notes</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('student/notes/')  ?>">Tasks</a>
                    </li>
                    <li class="selected">
                        <a href="<?php echo base_url('student/libraries/')  ?>">Library</a>
                    </li>
                     <li>
                        <a href="wikiversity.html">Wikiversity</a>
                    </li>
                     <li>
                        <a href="<?php base_url('student/courses/')  ?>">Courses</a>
                    </li>
                     <li>
                        <a href="#">Pay fee</a>
                    </li>
                    
                     <li>
                        <a href="#">Setting</a>
                    </li>
                    <li>
                        <a href="#">Helpdesk</a>
                    </li>
                    <li>
                        <a href="#t">Tabschool</a>
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
                                <img src="<?php echo STUDENT_THEME_URL ?>img/user.png" alt="">
                            </div>                            
                            
<div class="btn-group">
    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Archie Andrews <i class="material-icons">keyboard_arrow_down</i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.html"><i class="material-icons">account_circle</i> Profile</a>
        <a class="dropdown-item" href="#"> <span> &nbsp;&nbsp; &nbsp;  &nbsp; </span> Logout</a>       
    </div>
</div>
                        </div>
                        <!--end user image section-->

                    </li>
                    <li>
                        <a href="classfeed.html"> Classfeed </a>
                    </li>
                    <li>
                        <a href="my-book.html">My books</a>
                    </li>
                     <li>
                        <a href="my-notes.html">My notes</a>
                    </li>
                     <li>
                        <a href="task.html">Tasks</a>
                    </li>
                    <li class="selected">
                        <a href="library.html">Library</a>
                    </li>
                     <li>
                        <a href="wikiversity.html">Wikiversity</a>
                    </li>
                     <li>
                        <a href="courses.html">Courses</a>
                    </li>
                     <li>
                        <a href="pay-fees.html">Pay fee</a>
                    </li>
                    
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
            
