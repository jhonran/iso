<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Sistem Informasi Laboratorium Kimia PUSAT PENELITIAN KIMIA - LIPI</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

<!-- v4.0.0 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/et-line-font/et-line-font.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons/themify-icons.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/simple-lineicon/simple-line-icons.css" />
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="<?php echo base_url('dashboard');?>" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    
    <!-- logo for regular state and mobile devices --> 
     </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="<?php echo base_url('dashboard');?>"></a> </li>
      </ul>
      <div class="pull-left search-box">
        <form action="#" method="get" class="search-form" />
          <div class="input-group">
            <input name="search" class="form-control" placeholder="" type="text" />
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 new messages</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo base_url();?>assets//img/img1.jpg" class="img-circle" alt="User Image" /> <span class="profile-status online pull-right"></span></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo base_url();?>assets/img/img3.jpg" class="img-circle" alt="User Image" /> <span class="profile-status offline pull-right"></span></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">10:15 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo base_url();?>assets/img/img2.jpg" class="img-circle" alt="User Image" /> <span class="profile-status away pull-right"></span></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">8:45 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo base_url();?>assets/img/img4.jpg" class="img-circle" alt="User Image" /> <span class="profile-status busy pull-right"></span></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">12:15 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications  -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4><?php echo $this->session->userdata('is_username'); ?></h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url();?>assets/img/img1.jpg" class="user-image" alt="User Image" /> <span class="hidden-xs"><?php echo $this->session->userdata('is_username'); ?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="<?php echo base_url();?>assets/img/img1.jpg" class="img-responsive img-circle" alt="User" /></div>
                <p class="text-left"><?php echo $this->session->userdata('is_username'); ?> </p>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
              <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
              <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url('logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="<?php echo base_url();?>assets/img/img1.jpg" class="img-circle" alt="User Image" /> </div>
        <div class="info">
          <p><?php echo $this->session->userdata('is_username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li><a href="<?php echo base_url('dashboard');?>"><i class="icon-grid"></i> <span>Dashboard</span></a></li>
        <li class="treeview"> <a href="#"> <i class="icon-note"></i> <span>Analisis</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('permintaan_analisis');?>"><i class="fa fa-angle-right"></i>Data Permintaan Analisis</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="icon-user"></i> <span>Klien</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('klien');?>"><i class="fa fa-angle-right"></i>Data Klien</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="icon-drop"></i> <span>Jenis Uji</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('kelompok_jenis_uji');?>"><i class="fa fa-angle-right"></i>Kelompok Jenis Uji</a></li>
            <li><a href="<?php echo base_url('jenis_uji');?>"><i class="fa fa-angle-right"></i>Data Jenis Uji</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('operator');?>"><i class="icon-user"></i> <span>Data User</span></a></li>
        <li><a href="<?php echo base_url('instruksi_kerja');?>"><i class="icon-user"></i> <span>Instruksi Kerja</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header sty-one">
      <h1>
        <?php 
          if(isset($title)) {
            echo $title;
          };
        ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>">Home</a></li>
        <li><i class="fa fa-angle-right"></i> <?php 
          if(isset($title)) {
            echo $title;
          };
        ?></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <?php if(isset($content)){$this->load->view($content);};?>
      <!-- /.row --> 
    </section>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.0</div>
    Copyright © 2018. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
 

<!-- v4.0.0-alpha.6 --> 
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="<?php echo base_url();?>assets/js/adminkit.js"></script> 

<!-- Morris JavaScript --> 
<script src="<?php echo base_url();?>assets/plugins/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url();?>assets/plugins/morris/morris.js"></script> 
<script src="<?php echo base_url();?>assets/plugins/functions/dashboard1.js"></script> 

<!-- Chart Peity JavaScript --> 
<script src="<?php echo base_url();?>assets/plugins/peity/jquery.peity.min.js"></script> 
<script src="<?php echo base_url();?>assets/plugins/functions/jquery.peity.init.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">
          $(document).ready(function() {
            $('#example2').dataTable({
              'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
            });
          });
      
        </script>
</body>
</html>
