<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
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
                                    <h3 class="page-title"><b><i class="far fa-bell"></i>&nbsp; Notifikasi</b></h3>
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

                        <?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>


                        <div class="page-content-wrapper">
                           <div class="row">
                                <div class="col-12">
                            <div class="card m-b-20">
                                        <div class="card-body">
  
                                           <?php foreach ($listNotif as $n) { ?>

                <?php

                   if ($n->is_read == 0) {
                     $color='info';
                     $icon='far fa-bell';
                     $remark='Belum dibaca';
                   }else{
                     $color='secondary';
                     $icon='far fa-bell';
                     $remark='';
                    }
                    

                 ?>

                 <a href="<?php echo base_url().'pelanggan/tiket/detail/'.$n->id_tiket.'/'.$n->id_notif?>" class="text-reset notification-item">

              <div class="alert alert-<?=$color;?>" role="alert">
                                <h6><b>
                                        <font color="#0285b4"><i class='<?=$icon;?>'></i>&nbsp;<span class="badge badge-info"><?=$remark;?></span>  &nbsp;<?php echo $n->status_ticket ?> - <?php echo $n->perihal ?>
                                    </b></h6>

                                <i class='fas fa-user'></i>&nbsp; Dari : Admin <br>
                                <i class='fas fa-clock '></i>&nbsp; 

                                  <?php 

                                $timeNew = strtotime($n->notif_at);
                                $newformatNew = date('h:i:sa',$timeNew);
                                echo $newformatNew ?>

                                <?php 

                                $time = strtotime($n->notif_at);
                                 $newformat = date('Y-m-d',$time);
                                echo tgl_indo($newformat) ?></font>

                            </div>

                          </a>

                          <?php } ?>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



                  