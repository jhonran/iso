<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Sistem Informasi Laboratorium Kimia PUSAT PENELITIAN KIMIA - LIPI</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/et-line-font/et-line-font.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons/themify-icons.css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="hold-transition login-page sty1">
<div class="login-box sty1">
  <div class="login-box-body sty1">
  <div class="login-logo">
    <h6>Sistem Informasi Laboratorium Kimia</h6>
  </div>
    <?php echo form_open('login/proses_login', ''); ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" placeholder="Username" class="form-control">
        <?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>');?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" placeholder="Password" class="form-control">
        <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>');?>
      </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col --> 
      </div>
    <?php echo form_close(); ?>
    <!-- /.social-auth-links -->
    <p><?php echo $this->session->flashdata('pesan'); ?></p>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="<?php echo base_url();?>assets/js/niche.js"></script>
</body>
</html>