<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Sistem Monotoring Frekuensi Radio Ditjen SDPPI</title>
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style-login.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                   <a class="logo">
                        <span>
                            <img src="<?php echo base_url();?>assets/images/logo-kominfo.png" alt="" height="60"> <font color="white" size="5"><b> &nbsp;Kemkominfo</b></font>
                        </span>
                    </a>

                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="navbar-right d-flex list-inline float-right mb-0">
                            
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>
    
    
    
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo site_url();?>login"><i class="fas fa-lock"></i>Login</a>
                            </li>

                             <li class="has-submenu">
                                <a href="<?php echo site_url();?>login/register"><i class="far fa-registered"></i>Register User</a>
                            </li>

                             <li class="has-submenu">
                                <a href="<?php echo base_url();?>assets/images/2022_MANUAL_BOOK.pdf" download><i class="fas fa-address-book "></i>Manual Book</a>
                            </li>

                           
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

          <!-- page wrapper start -->
        <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->
            
            </div>
            <!-- page-title-box -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                    <img src="<?php echo base_url();?>assets/images/kemkominfo.jpg" alt="" height="125"><br></center>
                                      <center>
        
                   <?php if(isset($pesan)){
                       echo "<div class='alert bg-danger alert-dismissible col-9'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                   <h4><i class='icon fa fa-warning'></i> GAGAL !!</h4>
                        <b>$pesan</b></div>";
                        }
                        ?>
                        <?php if ($this->session->flashdata('pesan')): ?>
                            <b>
                               <div class='alert bg-danger alert-dismissible col-9'>
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                   <h4><i class="fas fa-user-slash"></i>&nbsp; GAGAL !!</h4>
                        <?php echo $this->session->flashdata('pesan'); ?></div>
                        </b>
                            <?php endif; ?>
                            
            </center>
                                    <form class="form-horizontal m-t-30" action="<?php base_url('login') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" required class="form-control" id="username" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" name="password" required class="form-control" id="userpassword" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary w-md waves-effect waves-light col-12" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->
        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        © 2022 <span class="d-none d-sm-inline-block"> - All right reserved
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/waves.min.js"></script>

        <script src="<?php echo base_url();?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>

</html>