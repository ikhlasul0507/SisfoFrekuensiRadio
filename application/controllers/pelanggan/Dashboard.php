  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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
		$grafikQuery = $this->db->query("SELECT COUNT(*) as jumlah, status FROM tiket WHERE id_pt='$idUser' GROUP BY status")->result();

		$data=array(
            "grafikList"=>$grafikQuery,
        );
      
		 $this->Mypage('isi/pelanggan/dashboard', $data);
	}

    
	
}
