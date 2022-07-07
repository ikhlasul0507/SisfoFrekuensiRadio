<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends My_Controller {

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

        $kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");

         $data=array(
            "kabupatenku"=>$kabupaten->result(),
        );
		 $this->Mypage('isi/adm/kabupaten',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_kabupaten', 'nm_kabupaten', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kabupaten');
        }else{
            $data=array(
                "nm_kabupaten"=>$_POST['nm_kabupaten'],
                "deleted" => 0
            );
            $this->db->insert('kabupaten',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kabupaten');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_kabupaten', 'nm_kabupaten', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kabupaten');
        }else{
            $data=array(
                "nm_kabupaten"=>$_POST['nm_kabupaten']
            );
            $this->db->where('id_kabupaten', $_POST['id_kabupaten'] );
            $this->db->update('kabupaten',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kabupaten');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/kabupaten');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_kabupaten', $id);
            $this->db->update('kabupaten',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/kabupaten');
        }
    }


	
}
