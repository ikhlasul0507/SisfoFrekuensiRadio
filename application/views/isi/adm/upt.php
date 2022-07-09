<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
                    


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h3 class="page-title"><b><i class="fas fa-address-book"></i>&nbsp; Data UPT Pelanggan</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Ditjen SDPPI Palembang</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                
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
  
                                            <table id="datatable2" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Perusahaan</b></th>
                                    <th><b>Nama PIC</b></th>
                                    <th><b>Alamat</b></th>
                                    <th><b>Tanggal Register</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($uptList as $u): ?>
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $u->nm_pt ?><br>Telp :<?php echo $u->telp ?></td>
                                    <td><?php echo $u->pic_name ?> - <?php echo $u->pic_jabatan ?> <br>Email : <?php echo $u->pic_email ?></td>
                                    <td><?php echo $u->alamat ?></td>
                                    <td><?php echo $u->register_at ?></td>
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->