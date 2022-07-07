<!DOCTYPE html>
<html>

    <head>
        
        <title>Sistem Monotoring Frekuensi Radio Ditjen SDPPI</title>
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
        <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-muted">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a class="logo">
                        <span>
                            <img src="<?php echo base_url();?>assets/images/logo-kominfo.png" alt="" height="60"> <font color="white">Kemkominfo</font>
                        </span>
                        <i>
                            <img src="<?php echo base_url();?>assets/images/logo-kominfo.png" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">

                        <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell noti-icon"></i>
                                    <span class="badge badge-pill badge-info noti-icon-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                        Pemberitahuan
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                        </a>
                                    </div>
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        Lihat Semua <i class="fi-arrow-right"></i>
                                    </a>
                                </div>        
                            </li>
                        
 <li><!-- <img src="<?php echo base_url();?>assets/images/cic.png" alt="" height="70" width="154">--></li>
                        
                          <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="<?php echo base_url(). 'login/logout' ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                        <li class="d-none d-sm-block">
                            
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu side-menu-light">
                <div class="slimscroll-menu" id="remove-scroll">



<div class="user-details">
                        <div class="float-left mr-2">
                            <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="" class="thumb-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                       <font color="#0285b4"><b><?=$this->session->userdata('nm_user') ?> </b></font>
                                    
                               
                                
                            </div>
                            
                            <p class="text-white"><font color="#0285b4"><?=$this->session->userdata('level') ?></font></p>
                        </div>
                    </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">

                            <?php if ($this->session->userdata('level')=="Administrator") { ?>
                          
                            <li>
                                <a href="<?php echo site_url();?>adm/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><font color=""><i class="fas fa-folder"></i></font><span> Data Master<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url();?>adm/kabupaten"><i class="fas fa-angle-double-right"></i> &nbsp;Kabupaten</a></li>
                                    <li><a href="<?php echo site_url();?>adm/kecamatan"><i class="fas fa-angle-double-right"></i> &nbsp;Kecamatan</a></li>
                                    <li><a href="<?php echo site_url();?>adm/service"><i class="fas fa-angle-double-right"></i> &nbsp;Service</a></li>
                                    <li><a href="<?php echo site_url();?>adm/upt"><i class="fas fa-angle-double-right"></i> &nbsp;UPT</a></li>
                                </ul>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>adm/pelanggan" class="waves-effect">
                                    <font color=""><i class="fas fa-address-book"></i></font><span> Pelanggan Register</span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>adm/user" class="waves-effect">
                                    <font color=""><i class="fas fa-users"></i></font><span> Users</span>
                                </a>
                            </li>

                             <?php }else if ($this->session->userdata('level')=="Pelanggan") { ?>

                                <li>
                                <a href="<?php echo site_url();?>pelanggan/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><font color=""><i class="fas fa-folder-open"></i></font><span> Data Tiket<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url();?>pelanggan/tiket"><i class="fas fa-angle-double-right"></i> &nbsp;New</a></li>
                                    <li><a href="<?php echo site_url();?>adm/kecamatan"><i class="fas fa-angle-double-right"></i> &nbsp;Inprogress</a></li>
                                    <li><a href="<?php echo site_url();?>adm/service"><i class="fas fas fa-angle-double-right"></i> &nbsp;Close</a></li>
                                </ul>
                            </li>


                                 <?php } ?>

                                 <li>
                                <a href="<?php echo base_url(). 'login/logout' ?>" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-out-alt"></i></font><span> Logout</span>
                                </a>
                            </li>                                          
                           

                           

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->