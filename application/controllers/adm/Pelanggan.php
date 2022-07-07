<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{

        $upt = $this->db->query("SELECT*FROM pt ORDER BY created_at");

         $data=array(
            "uptList"=>$upt->result()
        );
		 $this->Mypage('isi/adm/upt',$data);
	}
	
}
