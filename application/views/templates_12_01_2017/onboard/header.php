<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tabschool</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Favicons-->

<link rel="icon" href="<?php echo base_url();?>assets/front/images/favicon/favicon-32x32.png" sizes="32x32">

<!-- Favicons-->

<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/front/images/favicon/apple-touch-icon-152x152.png">

<!-- For iPhone -->

<meta name="msapplication-TileColor" content="#00bcd4">

<meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/front/images/favicon/mstile-144x144.png">

<!-- For Windows Phone -->

<!-- CORE CSS-->

<link href="<?php echo base_url();?>assets/front/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="<?php echo base_url();?>assets/front/css/materialdesignicons.css" type="text/css" rel="stylesheet">

<link href="<?php echo base_url();?>assets/front/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/register.css">

<!-- CSS for full screen (Layout-2)-->

<link href="<?php echo base_url();?>assets/front/css/style-fullscreen.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- Custome CSS-->

<link href="<?php echo base_url();?>assets/front/css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- CSS for full screen (Layout-2)-->

<link href="<?php echo base_url();?>assets/front/css/style-fullscreen.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->

<link href="<?php echo base_url();?>assets/front/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="<?php echo base_url();?>assets/front/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="<?php echo base_url();?>assets/front/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- jQuery Library --> 

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery-1.11.2.min.js"></script> 

<script>

var base_url = '<?php echo base_url(); ?>';    

</script>

<style>

.wrapper {

  min-height: 100%;

  overflow: hidden !important;

  position: relative;

}

.main-sidebar, .left-side {

  left: 0;

  min-height: 100%;

  padding-top: 50px;

  position: absolute;

  top: 0;

  transition: transform 0.3s ease-in-out 0s, width 0.3s ease-in-out 0s;

  width: 230px;

  z-index: 810;

}

.content-wrapper, .right-side, .main-footer {

  margin-left: 230px;

  transition: transform 0.3s ease-in-out 0s, margin 0.3s ease-in-out 0s;

  z-index: 820;

}

.content-wrapper, .right-side {

  background-color: #ecf0f5;

  min-height: 100%;

  z-index: 800;

}

.icon-bg {

   border-radius: 50%;

    color: #fff;

    font-size: 1rem !important;

    height: 26px;

    line-height: 26px !important;

    margin-top: 5px;  width: 1.65rem !important;

}

.card {

  box-shadow: none;

}

input.header-search-input {

  background: #fff;

}

input.header-search-input:hover {

  background: #fff;

}

.black {

  color: #333 !important;

}

.img-back {

  background: #fff;

  padding: 10px 15px;

  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);

  margin-right: 40px;

}

.rs-area {

  line-height: 0px !important;

  margin-left: 47px;

  margin-top: 5px;

  color: #666;

}

.btn-floating.btn-large {

  height: 45px;

  width: 45px;

}

.btn-floating.btn-large i {

  line-height: 44.5px;

}



.show_hide_box{height: 100%; float: left; background:#03A9F4; margin: 0px 20px 0px 0px;  text-align: center;

overflow: hidden; position: relative; width:0; opacity:0;  height:0; display:none;

transition:all ease-in-out 0.3s; -webkit-transition:all ease-in-out 0.3s; -moz-transition:all ease-in-out 0.3s;

}

.show_hide_box.hide_box_show{ width: 25%; opacity:1; height:auto; display:block;}



    .modal {

  transform: none !important;

  overflow-y:visible;

}

.right-login{

  margin-top:12px;margin-left:355px;

  }

.accordin-back{background:#DDDDDD; padding:5px 15px; margin-right:40px;}



.left-area{padding-top:5px; margin-top:21px;}





.form_error{

    color: red;

}

</style>

</head>



<body>



<div class="wrapper"> 

  <!-- START HEADER -->

   

  <header id="header" class="page-topbar"> 

    <!-- start header nav-->

    <div class="navbar-fixed">

   <div style=" background:#E05153; width:100%; height:20px; position:fixed; left:0; top:0; "></div>

  

      <nav class="" style="background:#F56A6C;margin-top:20px; box-shadow:none;">

        <div class="nav-wrapper">

         <div class="top_nav_btn">

            <a href="#" data-activates="slide-out"> <i class="large mdi  mdi-view-headline"></i> </a>

          </div>

         

          <ul class="left">

            <li>

              <div class="logo-wrapper"><a href="#" class="brand-logo darken-1"><img src="<?php echo base_url();?>assets/front/images/logo.png"></a></div>

            </li>

          </ul>

         

        <div class="right">

           <!--  <span class="btn " > Welcomr User </span>
 -->
           <!-- <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Drop Me!</a> -->



        <!-- Dropdown Structure -->

       <!--  <ul id='dropdown1' class='dropdown-content'>

          <li><a href="#!">one</a></li>

          <li><a href="#!">two</a></li>

          <li class="divider"></li>

          <li><a href="#!">three</a></li>

        </ul> -->

        </div>

          

        </div>

      </nav>

    </div>

    <!-- end header nav--> 

  </header>

  <!-- END HEADER -->   

	
