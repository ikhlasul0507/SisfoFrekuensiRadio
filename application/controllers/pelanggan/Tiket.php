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
		$upt = $this->db->query("SELECT*FROM upt WHERE deleted=0");
		$kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");
		$kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");
		$service = $this->db->query("SELECT*FROM service WHERE deleted=0");

         $data=array(
            "uptList"=>$upt->result(),
            "kecamatanList"=>$kecamatan->result(),
            "kabupatenList"=>$kabupaten->result(),
            "serviceList"=>$service->result(),
        ); 
		 $this->Mypage('isi/pelanggan/tiket', $data);
	}

    
	
}
