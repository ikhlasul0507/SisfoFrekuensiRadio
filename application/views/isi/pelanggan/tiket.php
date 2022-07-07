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
                                    <h3 class="page-title"><b><i class="fas fa-folder-open"></i>&nbsp; Daftar Tiket Kasus Gangguan</b></h3>
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
                                <div class="col-4">
                            <div class="card m-b-20">
                                        <div class="card-body">
  
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Tiket</b></th>
                                    <th width="150"><b>Status</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             
                                                </tbody>
                                            </table>
                                                
                                        </div>
                                    </div>
                                    </div>


                                    <div class="col-8">
                            <div class="card m-b-20">
                                        <div class="card-body">
  <h5><b>Tiket Baru</b></h5>

  <fieldset class="form-group floating-label-form-group">
              <label for="email">Perihal Gangguan</label>
              <input type="text" name="perihal" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
            </fieldset>

          <div class="row">
               <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kabupaten</label>
                          <select name="id_kabupaten" id="select" required class="custom-select">

                            <option value=""></option>
            
                  <?php foreach ($kabupatenList as $k): ?>
                  <option value="<?php echo $k->id_kabupaten ?>"><?php echo $k->nm_kabupaten ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
              </div>

              <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kecamatan</label>
                          <select name="id_kecamatan" id="select" required class="custom-select">

                            <option value=""></option>
            
                  <?php foreach ($kecamatanList as $kk): ?>
                  <option value="<?php echo $kk->id_kecamatan ?>"><?php echo $kk->nm_kecamatan ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
              </div>
            </div>

            <fieldset class="form-group floating-label-form-group">
                          <label for="email">UPT</label>
                          <select name="id_upt" id="select" required class="custom-select">

                            <option value=""></option>
            
                  <?php foreach ($uptList as $kk): ?>
                  <option value="<?php echo $kk->id_upt ?>"><?php echo $kk->nm_upt ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Service</label>
                          <select name="id_service" id="select" required class="custom-select">

                            <option value=""></option>
            
                  <?php foreach ($serviceList as $kk): ?>
                  <option value="<?php echo $kk->id_service ?>"><?php echo $kk->nm_service ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <button class="btn btn-primary w-md waves-effect waves-light col-12" type="submit"><i class="fas fa-plus"></i> Tambahkan Data Gangguan</button>

                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th><b>Frekuensi</b></th>
                                    <th><b>Alamat</b></th>
                                    <th><b>Jenis Gangguan</b></th>
                                    <th><b>Sifat Gangguan</b></th>
                                    <th><b>Tanggal</b></th>
                                    <th><b>Kota</b></th>
                                    <th><b>Sektor</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             
                                                </tbody>
                                            </table>
            <fieldset class="form-group floating-label-form-group">
            <label for="email">Lampiran Surat Pengaduan (Wajib) *pdf</label><br>
            <input type="file" name="file_surat" class="form-control">
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Tambahan Lampiran (Optional) *pdf</label><br>
            <input type="file" name="file_lampiran" class="form-control">
          </fieldset>  

          Uraian Gangguan 
          <textarea id="elm1" name="area"></textarea>          
                                                
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
                  <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Form Tambah Kabupaten</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/kabupaten/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama kabupaten</label>
                          <input type="text" name="nm_kabupaten" class="form-control  round <?php echo form_error('nm_kabupaten') ? 'is-invalid':'' ?>" id="email" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_kabupaten') ?></font>
                        </fieldset>
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>