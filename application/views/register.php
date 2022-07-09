<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Sistem Monotoring Frekuensi Radio Ditjen SDPPI</title>

  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">

  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/style-login.css" rel="stylesheet" type="text/css">
</head>

<body>

  <!-- Navigation Bar-->
  <header id="topnav">
    <div class="topbar-main">
      <div class="container-fluid">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

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

                  <center><h4>Register User</h4></center>

                  <form class="form-horizontal m-t-30" action="<?php echo site_url('login/register_add'); ?>" method="post" enctype="multipart/form-data">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active " id="home1" data-toggle="tab" href="#home1" role="tab">User Registrasi</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link disabled" id="profile1" data-toggle="tab" href="#profile1" role="tab">Profil User registrasi</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" id="messages1" data-toggle="tab" href="#messages1" role="tab">Registrasi Akun</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" id="settings1" data-toggle="tab" href="#settings1" role="tab">Profil Perusahaan</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active p-3" id="home1vIEW" role="tabpanel">
                        <p class="mb-0" align="justify">
                          Dalam Perjanjian ini, “Dokumentasi” berarti semua panduan dan instruksi pengguna yang disertakan oleh Penjual bersama Solusi; dan “Syarat yang Berlaku” secara kolektif berarti Masa Berlangganan sekaligus tipe Perangkat, Jumlah Perangkat yang Diizinkan, batasan lain yang diuraikan pada Pasal 2, serta Dokumentasi atau dokumen transaksi tentang pemerolehan Anda atas Solusi. Perjanjian ini menggantikan semua perjanjian yang sebelumnya Anda sepakati dalam kaitannya dengan versi Solusi yang sebelumnya.
                          <br>
                        </p>
                        <br>
                        <input type="checkbox" id="switch6" name="konfirmasi" class="form-control" switch="primary"/>
                        <label for="switch6" data-on-label="Setuju"
                        data-off-label="Tidak"></label>

                      </div>
                      <div class="tab-pane p-3" id="profile1vIEW" role="tabpanel">
                        <fieldset class="form-group floating-label-form-group">
                         <label for="email">Nama Pelapor</label>
                         <input type="text" name="pic_name" id="pic_name" class="form-control  round" >
                       </fieldset>
                       <fieldset class="form-group floating-label-form-group">
                         <label for="email">Jabatan</label>
                         <input type="text" name="pic_jabatan" id="pic_jabatan" class="form-control  round" >
                       </fieldset>
                       <fieldset class="form-group floating-label-form-group">
                         <label for="email">Email</label>
                         <input type="text" name="pic_email" id="pic_email" class="form-control  round" >
                       </fieldset>   
                     </div>
                     <div class="tab-pane p-3" id="messages1View" role="tabpanel">
                      <fieldset class="form-group floating-label-form-group">
                       <label for="email">Username</label>
                       <input type="text" name="username" id="username"  class="form-control  round" >
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                       <label for="email">Password</label>
                       <input type="password" name="password" id="password" class="form-control  round" >
                     </fieldset>
                   </div>
                   <div class="tab-pane p-3" id="settings1View" role="tabpanel">
                     <fieldset class="form-group floating-label-form-group">
                       <label for="email">Nama Perusahaan</label>
                       <input type="text" name="nm_pt" id="nm_pt" class="form-control  round" >
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                       <label for="email">Telepon</label>
                       <input type="text" name="telp" id="telp" class="form-control  round" >
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                       <label for="email">Alamat</label>
                       <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                     </fieldset>
                   </div>
                 </div>

                 <button class="btn btn-primary w-md waves-effect waves-light col-12" id="buttonNext" onclick="nextStep()" type="button">Next Step</button>

                 <button class="btn btn-primary w-md waves-effect waves-light col-12"  id="buttonSimpan" style="display: none;" onclick="onclick()" type="submit">Register User</button>

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

  <!-- Sweet-Alert  -->
  <script src="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url();?>assets/pages/sweet-alert.init.js"></script>
  <script src="<?php echo base_url();?>assets/alert.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url();?>assets/js/app.js"></script>
  <script type="text/javascript">

    var step = 0
    function nextStep() {

      var profile1 = document.getElementById('profile1');
      var profile1vIEW = document.getElementById('profile1vIEW');
      

      var home1 = document.getElementById('home1');
      var home1vIEW = document.getElementById('home1vIEW');
      
      var messages1 = document.getElementById('messages1');
      var messages1View = document.getElementById('messages1View');


      var settings1 = document.getElementById('settings1');
      var settings1View = document.getElementById('settings1View');


      var checkedValue = $('#switch6:checked').val();


      var pic_name = document.getElementById('pic_name').value;
      var pic_jabatan = document.getElementById('pic_jabatan').value;
      var pic_email = document.getElementById('pic_email').value;
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      var pic_name = document.getElementById('pic_name').value;
      var nm_pt = document.getElementById('nm_pt').value;
      var telp = document.getElementById('telp').value;
      var alamat = document.getElementById('alamat').value;

      if (step === 0){
        if (checkedValue === undefined){
          alert("please check to next Step !");
        }else{
          home1.classList.remove("active");
          home1vIEW.classList.remove("active");
          home1.classList.add("disabled");

          profile1.classList.add("active");
          profile1vIEW.classList.add("active");
          step++;
        }
      }else if(step === 1){
        if(pic_name === ''){
          alert("silahkan nama pelapor");
        }else if(pic_jabatan === ''){
          alert("silahkan jabatan");
        }else if(pic_email === ''){
          alert("silahkan email");
        }else{
          profile1.classList.remove("active");
          profile1.classList.add("disabled");
          profile1vIEW.classList.remove("active");

          messages1.classList.add("active");
          messages1View.classList.add("active");
          step++;
        }
      }else if(step === 2){
        if ( username === ''){
          alert('isi username');
        }else if( password === ''){
          alert("please input password");
        }else{
          messages1.classList.remove("active");
          messages1.classList.add("disabled");
          messages1View.classList.remove("active");

          settings1.classList.add("active");
          settings1View.classList.add("active");
          step++;

          document.getElementById('buttonNext').style.display='none';
          document.getElementById('buttonSimpan').style.display='inline';

        }
      }
      // body...
    }
  </script>
</body>

</html>