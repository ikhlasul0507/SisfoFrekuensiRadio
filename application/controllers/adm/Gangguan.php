<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan extends My_Controller {

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

        $gangguan = $this->db->query("SELECT*FROM gangguan WHERE deleted=0");

         $data=array(
            "gangguanku"=>$gangguan->result(),
        );
         $this->Mypage('isi/adm/gangguan',$data);
    }


    
      public function add()
    {
        $this->form_validation->set_rules('nm_gangguan', 'nm_gangguan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/gangguan');
        }else{
            $data=array(
                "nm_gangguan"=>$_POST['nm_gangguan'],
                "deleted" => 0
            );
            $this->db->insert('gangguan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/gangguan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_gangguan', 'nm_gangguan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/gangguan');
        }else{
            $data=array(
                "nm_gangguan"=>$_POST['nm_gangguan']
            );
            $this->db->where('id_gangguan', $_POST['id_gangguan'] );
            $this->db->update('gangguan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/gangguan');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/gangguan');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_gangguan', $id);
            $this->db->update('gangguan',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/gangguan');
        }
    }


    
}
