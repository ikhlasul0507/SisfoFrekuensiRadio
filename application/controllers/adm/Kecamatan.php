<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends My_Controller {

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

        $kecamatan = $this->db->query("SELECT*FROM kecamatan 
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten = kecamatan.id_kabupaten WHERE kecamatan.deleted=0");
        $kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");

         $data=array(
            "kecamatanku"=>$kecamatan->result(),
            "kabupatenList"=>$kabupaten->result()
        );
		 $this->Mypage('isi/adm/kecamatan',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_kecamatan', 'nm_kecamatan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kecamatan');
        }else{
            $data=array(
                "nm_kecamatan"=>$_POST['nm_kecamatan'],
                "id_kabupaten"=>$_POST['id_kabupaten'],
                "deleted" => 0
            );
            $this->db->insert('kecamatan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kecamatan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_kecamatan', 'nm_kecamatan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kecamatan');
        }else{
            $data=array(
                "nm_kecamatan"=>$_POST['nm_kecamatan'],
                "id_kabupaten"=>$_POST['id_kabupaten']
            );
            $this->db->where('id_kecamatan', $_POST['id_kecamatan'] );
            $this->db->update('kecamatan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kecamatan');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/kecamatan');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_kecamatan', $id);
            $this->db->update('kecamatan',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/kecamatan');
        }
    }


	
}
