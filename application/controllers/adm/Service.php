<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends My_Controller {

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

        $service = $this->db->query("SELECT*FROM service WHERE deleted=0");

         $data=array(
            "serviceku"=>$service->result(),
        );
		 $this->Mypage('isi/adm/service',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_service', 'nm_service', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/service');
        }else{
            $data=array(
                "nm_service"=>$_POST['nm_service'],
                "deleted" => 0
            );
            $this->db->insert('service',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/service');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_service', 'nm_service', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/service');
        }else{
            $data=array(
                "nm_service"=>$_POST['nm_service']
            );
            $this->db->where('id_service', $_POST['id_service'] );
            $this->db->update('service',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/service');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/service');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_service', $id);
            $this->db->update('service',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/service');
        }
    }


	
}
