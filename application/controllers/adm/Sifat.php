<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifat extends My_Controller {

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

        $sifat = $this->db->query("SELECT*FROM sifat WHERE deleted=0");

         $data=array(
            "sifatku"=>$sifat->result(),
        );
		 $this->Mypage('isi/adm/sifat',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_sifat', 'nm_sifat', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/sifat');
        }else{
            $data=array(
                "nm_sifat"=>$_POST['nm_sifat'],
                "deleted" => 0
            );
            $this->db->insert('sifat',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/sifat');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_sifat', 'nm_sifat', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/sifat');
        }else{
            $data=array(
                "nm_sifat"=>$_POST['nm_sifat']
            );
            $this->db->where('id_sifat', $_POST['id_sifat'] );
            $this->db->update('sifat',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/sifat');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/sifat');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_sifat', $id);
            $this->db->update('sifat',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/sifat');
        }
    }


	
}
