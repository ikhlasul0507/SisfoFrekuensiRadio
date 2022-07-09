  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Pelanggan"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
		$idUser=$this->session->userdata('id_user');
		$upt = $this->db->query("SELECT*FROM upt WHERE deleted=0");
		$kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");
		$kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");
		$service = $this->db->query("SELECT*FROM service WHERE deleted=0");
		$gangguan = $this->db->query("SELECT*FROM gangguan WHERE deleted=0");
		$sifat = $this->db->query("SELECT*FROM sifat WHERE deleted=0");
		$ticket= $this->db->query("SELECT*FROM tiket WHERE status='NEW' AND id_pt='$idUser'");

         $data=array(
            "uptList"=>$upt->result(),
            "kecamatanList"=>$kecamatan->result(),
            "kabupatenList"=>$kabupaten->result(),
            "serviceList"=>$service->result(),
            "gangguanList"=>$gangguan->result(),
            "sifatList"=>$sifat->result(),
            "ticketList"=>$ticket->result()
        ); 
		 $this->Mypage('isi/pelanggan/tiket', $data);
	}


    public function add()
    {
        $this->form_validation->set_rules('perihal', 'perihal', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pelanggan/tiket');
        }else{
            $namaFilefile_surat = $this->doUpload('file_surat');
            $namaFilefile_lampira = $this->doUpload('file_lampiran');
    //var_dump($file_lampiran);die;

            if ($namaFilefile_surat != "default.png") {
                $namaFileSuratBaru = $namaFilefile_surat.'.pdf';  
            }

            if ($namaFilefile_lampira != "default.png") {
                $namaFileLampiranBaru = $namaFilefile_lampira.'.pdf';  
            }

            if ($namaFilefile_surat == "default.png") {
                $namaFileSuratBaru = "default.png";  
            }

            if ($namaFilefile_lampira == "default.png") {
                $namaFileLampiranBaru = "default.png";  
            }

            $id = uniqid();

            $data=array(
            	"id_tiket"=>$id,
                "perihal"=>$_POST['perihal'],
                "id_kecamatan"=>$_POST['id_kecamatan'],
                "id_upt"=>$_POST['id_upt'],
                "id_service"=>$_POST['id_service'],
                "frekuensi"=>$_POST['frekuensi'],
                "lokasi"=>$_POST['lokasi'],
                "id_gangguan"=>$_POST['id_gangguan'],
                "id_sifat"=>$_POST['id_sifat'],
                "tgl_gangguan"=>$_POST['tgl_gangguan'],
                "sektor"=>$_POST['sektor'],
                "file_surat"=>$namaFileSuratBaru,
                "file_lampiran"=> $namaFileLampiranBaru,
                "status"=>"New",
                "id_pt"=>$this->session->userdata('id_user'),
                "gangguan_desc"=>$_POST['gangguan_desc'],
                "created_at"=>date('Y-m-d H:i:s')
            );
            $this->db->insert('tiket',$data);

            $notifikasiArray = array(
              "id_tiket"=>$id,
              "notif_to"=>'admin',
              "is_read"=> 0,
              "notif_at"=>date('Y-m-d H:i:s'),
              "status_ticket"=>"New"

             );
            $this->db->insert('notifikasi',$notifikasiArray);

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('pelanggan/tiket');
        }
    }
    public function getKecamatanJSON(){
    	$idKabupaten = $this->input->post('idKabupaten');
    	$kecamatan = $this->db->query("SELECT * FROM kecamatan WHERE id_kabupaten='$idKabupaten' AND deleted=0")->result_array();
    	echo json_encode($kecamatan);
    }

    private function doUpload($value){
        $id = uniqid();
        $config['upload_path']          = './assets/images/surat/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $id;
        $config['overwrite']            = true;
        $config['max_size']             = 2024;

        $this->load->library('upload', $config);
        $upload_ = $_FILES[$value]['name'];

        if($upload_ ){
            if ($this->upload->do_upload($value)) {
                $fileNamePdf = $this->upload->data($value);
            }
        }else{
            $id='default.png';
        }

        return $id;
    }

    public function detail($id=null, $action=null) {
        $ticketQuery= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.id_tiket='$id'");
        $upt = $this->db->query("SELECT*FROM upt WHERE deleted=0");
        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");
        $kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");
        $service = $this->db->query("SELECT*FROM service WHERE deleted=0");
        $gangguan = $this->db->query("SELECT*FROM gangguan WHERE deleted=0");
        $sifat = $this->db->query("SELECT*FROM sifat WHERE deleted=0");

        if ($action != null) {
            $notif=array(
            "is_read"=>1
            );
           $this->db->where('id_notif', $action);
           $this->db->update('notifikasi',$notif);
        }

         $data=array(
            "tiket"=>$ticketQuery->row(),
            "uptList"=>$upt->result(),
            "kecamatanList"=>$kecamatan->result(),
            "kabupatenList"=>$kabupaten->result(),
            "serviceList"=>$service->result(),
            "gangguanList"=>$gangguan->result(),
            "sifatList"=>$sifat->result(),
         ); 

         $this->Mypage2('isi/pelanggan/tiket_detail', $data);
    }

        public function inprogress()
    {
        $idUser=$this->session->userdata('id_user');
        $ticket= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.status IN ('NEW','Verified') AND tiket.id_pt='$idUser'");

         $data=array(
            
            "ticketList"=>$ticket->result()
        ); 
         $this->Mypage('isi/pelanggan/tiket_inprogress', $data);
    }

    public function close()
    {
        $idUser=$this->session->userdata('id_user');
        $ticket= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.status IN ('Closed', 'Resolved') AND tiket.id_pt='$idUser'");

         $data=array(
            
            "ticketList"=>$ticket->result()
        ); 
         $this->Mypage('isi/pelanggan/tiket_close', $data);
    }

	
}
