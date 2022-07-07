<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upt extends My_Controller {

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

        $upt = $this->db->query("SELECT*FROM upt WHERE deleted=0");

         $data=array(
            "uptku"=>$upt->result(),
        );
		 $this->Mypage('isi/adm/uptList',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_upt', 'nm_upt', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/upt');
        }else{
            $data=array(
                "nm_upt"=>$_POST['nm_upt'],
                "deleted" => 0
            );
            $this->db->insert('upt',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/upt');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_upt', 'nm_upt', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/upt');
        }else{
            $data=array(
                "nm_upt"=>$_POST['nm_upt']
            );
            $this->db->where('id_upt', $_POST['id_upt'] );
            $this->db->update('upt',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/upt');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/upt');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_upt', $id);
            $this->db->update('upt',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/upt');
        }
    }


	
}
