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
        <li class="treeview"> <a href="#"> <i class="icon-drop"></i> <span>Data Master</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('level_user');?>"><i class="fa fa-angle-right"></i>Level User</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="icon-drop"></i> <span>Setting</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('database');?>"><i class="fa fa-angle-right"></i> <span>Database</span></a></li>
            <li><a href="<?php echo base_url('log_data');?>"><i class="fa fa-angle-right"></i> <span>Log Data</span></a></li>
          </ul>
        </li>
      </ul>