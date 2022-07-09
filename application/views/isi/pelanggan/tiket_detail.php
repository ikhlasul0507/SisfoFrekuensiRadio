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
            <h3 class="page-title"><b><i class="fas fa-folder-open"></i>&nbsp; Tiket : <?=$tiket->perihal?></b></h3>
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

            <?php
            $isDissable="disabled";
            if ($tiket->status == "New") {
             $color='warning';
             $icon='far fa-bell';
             $remark='Not Verified';
             $isDissable="";
           }else if ($tiket->status == "Verified") {
             $color='success';
             $icon='far fa-bell';
             $remark='Verified';
             $isDissable="";
           }else if ($tiket->status == "Closed") {
             $color='dark';
             $icon='far fa-bell';
             $remark='Close with Solution';
             $isDissable="disabled";
           }else if ($tiket->status == "Resolved") {
             $color='info';
             $icon='far fa-bell';
             $remark='Resolved without Solution';
             $isDissable="disabled";
           }


           ?>

           <div class="alert alert-<?=$color;?>" role="alert">
             <center><b><h4><?=$remark;?></h4></b></center>
           </div>

           <!-- Nav tabs -->
           <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Informasi Tiket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Informasi Gangguan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Informasi Pelapor</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active p-3" id="home1" role="tabpanel">


              <fieldset class="form-group floating-label-form-group">
                <label for="email">Perihal Gangguan</label>
                <input type="text" name="perihal" value="<?=$tiket->perihal?>" disabled class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>



              <fieldset class="form-group floating-label-form-group">
                <label for="email">Lampiran Surat Pengaduan *pdf</label><br>
                <a data-toggle="modal" data-target="#surat" href="#">
                  <?=$tiket->file_surat?>
                </a>
              </fieldset>

              <fieldset class="form-group floating-label-form-group">
                <label for="email">Lampiran </label><br>
                <a data-toggle="modal" data-target="#lampiran" href="#">
                  <?=$tiket->file_lampiran?>
                </a>
              </fieldset>  

              <?php if($tiket->status=="Closed" || $tiket->status=="Resolved"){?>
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">Lampiran Hasil Solusi </label><br>
                  <a data-toggle="modal" data-target="#solusi" href="#">
                    <?=$tiket->file_solusi?>
                  </a>
                </fieldset>

              <?php } ?>


              Uraian Gangguan 
              <textarea id="elm1" name="gangguan_desc" disabled> <?=$tiket->gangguan_desc?></textarea>



            </div>
            <div class="tab-pane p-3" id="profile1" role="tabpanel">

             <div class="row">
               <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">Kabupaten</label>
                  <select  name ="id_kabupaten" id="id_kabupaten" disabled onchange="getKecamatan()" required class="custom-select">

                    <option value=""><?=$tiket->nm_kabupaten?></option>


                  </select>
                </fieldset>
              </div>

              <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">Kecamatan</label>
                  <select name="id_kecamatan" disabled id="id_kecamatan" required class="custom-select">
                   <option><?=$tiket->nm_kecamatan?></option>
                 </select>
               </fieldset>
             </div>

           </div>

           <fieldset class="form-group floating-label-form-group">
            <label for="email">UPT</label>
            <select name="id_upt" id="select" disabled required class="custom-select">

              <option value=""><?=$tiket->nm_upt?></option>

            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Service</label>
            <select name="id_service" id="select" required disabled class="custom-select">

              <option value=""><?=$tiket->nm_service?></option>

            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label>Frekuensi</label>
            <input type="text" name="frekuensi" disabled value="<?=$tiket->frekuensi?>" class="form-control  round" id="email" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')" placeholder="Masukan frekuensi">
          </fieldset>
          <fieldset class="form-group floating-label-form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" disabled value="<?=$tiket->lokasi?>" class="form-control  round" id="email" placeholder="Masukan lokasi">
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Jenis Gangguan</label>
            <select name="id_gangguan" id="select" disabled required class="custom-select">

              <option value=""><?=$tiket->nm_gangguan?></option>

            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Sifat Gangguan</label>
            <select name="id_sifat" id="select" required disabled class="custom-select">

              <option value=""><?=$tiket->nm_sifat?></option>
            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label>Tanggal Gangguan</label>
            <input type="date" name="tgl_gangguan" disabled value="<?=$tiket->tgl_gangguan?>" class="form-control  round" id="email">
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label>Sektor</label>
            <input type="text" name="sektor" disabled value="<?=$tiket->sektor?>" class="form-control  round" id="email" placeholder="Masukan sektor">
          </fieldset>
        </div>

        <div class="tab-pane p-3" id="messages1" role="tabpanel">
         <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th><b>Nama Perusahaan</b></th>
              <th><b>Nama PIC</b></th>
              <th><b>Alamat</b></th>
              <th><b>Tanggal Register</b></th>
            </tr>
          </thead>


          <tbody>

            <tr>
              <td><?php echo $tiket->nm_pt ?><br>Telp :<?php echo $tiket->telp ?></td>
              <td><?php echo $tiket->pic_name ?> - <?php echo $tiket->pic_jabatan ?> <br>Email : <?php echo $tiket->pic_email ?></td>
              <td><?php echo $tiket->alamat ?></td>
              <td><?php echo $tiket->register_at ?></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>

<p align="right">
     <button class="btn btn-info col-3" onclick="printDiv()">
      <i class="fas fa-print"></i> &nbsp; Cetak Tiket
    </button>
</p>
    



  </div>
</div>
</div>

 >


</div> <!-- end col -->
</div> <!-- end row -->






</div>
<!-- end page content-->

</div> <!-- container-fluid -->

</div> <!-- content -->


<!-- Modal -->
<div class="modal fade text-left" id="surat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h6 class="modal-title"><font color='white'>Lampiran Surat</font></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php if ($tiket->file_surat == "default.png") { ?>
          <center>
            <img src="<?php echo base_url('assets/images/surat/'.$tiket->file_surat) ?>" height="500" height="750"><br>Tidak ada file permohonan yang dilampirkan</center>
          <?php }else{ ?>
            <embed src="<?php echo base_url('assets/images/surat/'.$tiket->file_surat) ?>" width="750px" height="450px" />
            <?php }?> 

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
              <i class="fas fa-times"></i>&nbsp;Keluar
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade text-left" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h6 class="modal-title"><font color='white'>Berkas Lampiran</font></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php if ($tiket->file_lampiran == "default.png") { ?>
            <center>
              <img src="<?php echo base_url('assets/images/surat/'.$tiket->file_lampiran) ?>" height="500" height="750"><br>Tidak ada file permohonan yang dilampirkan</center>
            <?php }else{ ?>
              <embed src="<?php echo base_url('assets/images/surat/'.$tiket->file_lampiran) ?>" width="750px" height="450px" />
              <?php }?> 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                <i class="fas fa-times"></i>&nbsp;Keluar
              </button>

            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="solusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h6 class="modal-title"><font color='white'>Berkas File Solusi</font></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?php if ($tiket->file_solusi == "default.png") { ?>
              <center>
                <img src="<?php echo base_url('assets/images/solusi/'.$tiket->file_solusi) ?>" height="500" height="750"><br>Tidak ada file yang dilampirkan</center>
              <?php }else{ ?>
                <embed src="<?php echo base_url('assets/images/solusi/'.$tiket->file_solusi) ?>" width="750px" height="450px" />
                <?php }?> 

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                  <i class="fas fa-times"></i>&nbsp;Keluar
                </button>

              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="content-page">
  <!-- Start content -->
  <div class="content" >
    <div class="container-fluid">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
      
    </div>
    <!-- end row -->

    <div class="page-content-wrapper" >
     <div class="row" id="printDetail" style="display: none;" >
       <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">


           <div class="alert alert-<?=$color;?>" role="alert">
             <center><b><h4>Print Ticket</h4></b></center>
           </div>

           <table class="table" >
            <thead>
              <tr>
                <th scope="col">Perihal Gangguan</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->perihal?></th>
              </tr>
              <tr>
                <th scope="col">Nama Perusahaan Pelapor</th>
                <th scope="col">:</th>
                <th scope="col"><?php echo $tiket->nm_pt ?></th>
              </tr>
              <tr>
                <th scope="col">Nama PIC</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->pic_name?></th>
              </tr>
              <tr>
                <th scope="col">Tanggal Register  </th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->register_at ?></th>
              </tr>
              <tr>
                <th scope="col">Uraian Gangguan</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->gangguan_desc?></th>
              </tr>
              <tr>  
                <th scope="col">Lokasi Gangguan</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->nm_kabupaten?>, <?=$tiket->nm_kecamatan?>, <?=$tiket->lokasi?></th>
              </tr>
              <tr>
                <th scope="col">UPT</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->nm_upt?></th>
              </tr>
              <tr>
                <th scope="col">Service</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->nm_service?></th>
              </tr>
              <tr>
                <th scope="col">Frekuensi</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->frekuensi?></th>
              </tr>
              <tr>
                <th scope="col">Jenis Gangguan</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->nm_gangguan?></th>
              </tr>
              <tr>
                <th scope="col">Sifat Gangguan </th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->nm_sifat?></th>
              </tr>
              <tr>
                <th scope="col">Tanggal Gangguan</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->tgl_gangguan?></th>
              </tr>
              <tr>
                <th scope="col">Sektor</th>
                <th scope="col">:</th>
                <th scope="col"><?=$tiket->sektor?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end col -->
</div> <!-- end row -->
</div>
<!-- end page content-->
</div> <!-- container-fluid -->
</div> <!-- content -->


  <script type="text/javascript">
    function printDiv() {
     var printContents = document.getElementById('printDetail').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }
 </script>