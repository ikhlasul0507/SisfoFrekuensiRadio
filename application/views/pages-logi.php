<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">

    <title>Sistem Komoditi Dinas Perdagangan</title>
  
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/bootstrap-extend.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/master_style.css">

    <!-- Superieur Admin skins -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/_all-skins.css">  
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">


</head>

<body class="hold-transition bg-bubbles-white bg-pale-cyan" data-overlay="4">
    
    <div class="container h-p100">

        <div class="row align-items-center justify-content-md-center h-p100">           
            <div class="col-12">
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
                <div class="row no-gutters justify-content-md-center">

                    <div class="col-lg-5 col-md-4 col-12">

                        <div class="content-top-agile h-p100">
                            <h2 class="text-secondary"><b>Sistem Informasi</b><br><b> Komoditi Bahan Pangan</b></h2>
                            <p class="text-white">
                            <i class="mdi mdi-drag-horizontal mr-5"></i>
                            <i class="mdi mdi-drag-horizontal mr-5"></i>
                            &nbsp;&nbsp;<b>Dinas Perdagangan Provinsi Sumatera Selatan</b>&nbsp;&nbsp;
                            <i class="mdi mdi-drag-horizontal mr-5"></i>
                            <i class="mdi mdi-drag-horizontal mr-5"></i>
                            </p>
                             <br>
                            <div class="text-center text-white">
                            <img src="<?php echo base_url();?>assets/images/logoo.png" height='150'>
                             
                            </div>
                            
                        </div>              
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                    <div class="ribbon ribbon-bookmark ribbon-right bg-primary"><i class="fa fa-users"></i>&nbsp;&nbsp;<b> LOGIN SISTEM</b></div>
                        <div class="p-40 bg-white content-bottom h-p100">
                       <br>
                         <div class='alert bg-primary alert-dismissible'>
                                   <h6><center><i class="icon fa fa-pencil"></i> Masukan Username & Password Anda. </center></h6>
                               </div>

                            <form action="<?php base_url('login') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border-primary"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control pl-15" name="username" placeholder="Username" <?php echo form_error('username') ? 'is-invalid':'' ?>>
                                    </div>
                                </div>
                                <font color="red"><?php echo form_error('username') ?></font>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border-primary"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control pl-15" placeholder="Password" <?php echo form_error('password') ? 'is-invalid':'' ?>>
                                        
                                    </div>
                                </div>
                                <font color="red"><?php echo form_error('password') ?></font>

                                  <div class="row">
                                    <div class="col-6">
                                      
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                     
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">

                                      <button type="submit" class="btn btn-primary btn-block margin-top-10"><b><i class="fas fa-sign-in-alt "></i>&nbsp; MASUK</b></button>
                                     
                                    </div>
                                    <!-- /.col -->
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery 3 -->
    <script src="<?php echo base_url();?>assets/assets/jquery-3.3.1.js"></script>
    
    <!-- popper -->
    <script src="<?php echo base_url();?>assets/assets/popper.min.js"></script>
    
    <!-- Bootstrap 4.0-->
    <script src="<?php echo base_url();?>assets/assets/bootstrap.min.js"></script>



</body>
</html>
