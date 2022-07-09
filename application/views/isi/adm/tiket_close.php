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
            <h3 class="page-title"><b><i class="fas fa-folder-open"></i>&nbsp; Daftar Tiket Verified</b></h3>
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
                <tr align="center">
                  <th><b>Tiket</b></th>
                </tr>
              </thead>
              
              
              <tbody>
               <?php 
                function limit_words($string, $word_limit){
                   $words = explode(" ",$string);
                   return implode(" ",array_splice($words,0,$word_limit));
                }
               $no=1; foreach ($ticketList as $tiket): ?>

                <?php

                   if ($tiket->status == "New") {
                     $color='primary';
                     $icon='far fa-bell';
                     $remark='Not Verified';
                   }else if ($tiket->status == "Verified") {
                     $color='success';
                     $icon='far fa-bell';
                     $remark='Verified';
                   }else if ($tiket->status == "Closed") {
                     $color='dark';
                     $icon='far fa-bell';
                     $remark='Close With Solution';
                   }else if ($tiket->status == "Resolved") {
                     $color='info';
                     $icon='far fa-bell';
                     $remark='Resolved Without Solution';

                   }
                    

                 ?>

               <tr>
                 <td>
                  <a href="<?php echo base_url().'adm/tiket/detail/'.$tiket->id_tiket?>">
                         <div class="col-lg-12">
                                    <div class="card m-b-30">
                                        <div class="card-header bg-<?=$color?>">
                                            <span class="badge badge-light"><?=$remark;?></span> <font color="white"><?=$tiket->perihal?></font>
                                        </div>
                                        <div class="card-body">
                                            <blockquote class="card-blockquote mb-0">
                                                Deskripsi Keluhan : <?php echo limit_words($tiket->gangguan_desc,18);?> .....
                                                <footer class="blockquote-footer font-12">
                                                    <i class='far fa-building '></i>&nbsp; <?=$tiket->nm_pt;?> &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class='fas fa-user'></i>&nbsp; PIC : <?=$tiket->pic_name;?> <br><cite title="Source Title"><i class='fas fa-clock '></i>&nbsp; Dibuat pada : <?=$tiket->created_at;?></cite>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                </a>
                              </td>
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



<!-- Modal -->


