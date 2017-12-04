<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tabschool - Institute Console</title>
<!-- Icon StyleSheet-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
<!--Materialize Style Sheet-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/institute/css/materialize.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/institute/css/custom-style.css">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Javascript Files -->
<script src="<?php echo base_url();?>assets/frontend/institute/js/materialize.min.js"></script>

<script>
    var base_url = '<?php echo base_url(); ?>';
</script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('select').material_select();
  });
</script>

<style>
    .success-msg{background-color: #00FF7F; padding:5px; margin-bottom:5px !important; }
</style>
</head>

<body>
<header>
<div class="navbar-fixed">
<div class="upper-head"></div>
<nav>
	<div class="nav-wrapper">
      <div class="tabschool-logo-area">
        	<div class="tabschool-logo">
        		<a href="http://www.tabschool.in" target="_blank">   <img src="<?php echo FRONTEND_THEME_URL ?>img/logo.png"></a>
                </div>
                    
        </div>
       
     <div class="mobile-menu hide-on-large-only">
     	<ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="images/userimage-new.png">
      </div>
      <a href="#!user"><img class="circle" src="<?php echo base_url(); ?>assets/institute/images/pp-img.png"></a>
      <a href="#!name"><span class="white-text name">Chandigarh University</span></a>
      <a href="#!email"><span class="white-text email">staff@chandigarhuniversity.co.in</span></a>
    </div></li>
    <li><a class="waves-effect" href="dashboard">Dashboard</a></li>
    <li><a class="waves-effect" href="institute/students">Students</a></li>
    <li><a class="waves-effect" href="teachers.html">Teachers</a></li>
    <li><a class="waves-effect" href="settings.html">Settings</a></li>
    <li><a class="waves-effect" href="http://www.tabschool.in/welcome/support" target="_blank">Helpdesk</a></li>
    <li><a class="waves-effect" href="http://www.tabschool.in/" target="_blank">About Tabschool</a></li>
    <li><a class="waves-effect" href="#!">Sign Out</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
     </div>
    <div class="profile hide-on-med-and-down">

    </div>	
 
    </div>  
    
    </div>
</nav>
</div>
</header>
<!--Body-->


<style>
    .error{color: red}
</style>