            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
      


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h3 class="page-title"><b><i class="fas fa-user-cog"></i>&nbsp;Ubah Password</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Sistem Komoditi Sumatera Selatan</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                                            
                                            <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                        </div>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

<?php if ($this->session->flashdata('successs')): ?>
             
                               <div class='alert bg-success alert-dismissible'>
                               <a type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                           <font color="white"><h4><i class="icon fa fa-check-square"></i> Success !!</h4>
                        <?php echo $this->session->flashdata('successs'); ?></font>  </div>
                            <?php endif; ?> 

                            <?php if ($this->session->flashdata('success')): ?>
             
                               <div class='alert bg-danger alert-dismissible'>
                               <a type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                                   <font color="white"><h4><i class="fas fa-exclamation-triangle "></i> Gagal !!</h4>
                        <?php echo $this->session->flashdata('success'); ?></font></div>
                            <?php endif; ?> 
                    
<form action="<?php base_url('adm/ubah_password') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password Lama</label>
                          <input type="password" name="current_password" class="form-control <?php echo form_error('current_password') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('current_password') ?></font>
                        </fieldset>
                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password Baru</label>
                          <input type="password" name="pass_baru" class="form-control <?php echo form_error('pass_baru') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('pass_baru') ?></font>
                        </fieldset>
                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Ulangi Password Baru</label>
                          <input type="password" name="pass_baru2" class="form-control <?php echo form_error('pass_baru2') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('pass_baru2') ?></font>
                        </fieldset>
                 

     <button type="submit" class="btn btn-outline btn-success"><b><i class='fa fa-save'></i> &nbsp;&nbsp;Simpan</b>&nbsp;&nbsp;</button>&nbsp;&nbsp;

                      </form>
                        
                                            
    
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    
                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->






                  