<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends My_Controller {

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

        $notif = $this->db->query("SELECT*FROM notifikasi
    
                                              LEFT JOIN tiket ON tiket.id_tiket=notifikasi.id_tiket
                                              LEFT JOIN pt ON pt.id_pt=tiket.id_pt
                                              WHERE notifikasi.notif_to='admin'  ORDER BY notifikasi.notif_at DESC");

         $data=array(
            "listNotif"=>$notif->result(),
        );
		 $this->Mypage('isi/adm/notifikasi',$data);
	}
	
}
