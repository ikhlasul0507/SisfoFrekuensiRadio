  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends My_Controller {

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
		$ticket= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.status='NEW' ORDER BY tiket.created_at ASC");

         $data=array(
            
            "ticketList"=>$ticket->result()
        ); 
		 $this->Mypage('isi/adm/tiket', $data);
	}

    public function detail($id=null, $action=null) {
        $ticketQuery= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.id_tiket='$id'");
        $upt = $this->db->query("SELECT*FROM upt WHERE deleted=0");
        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");
        $kabupaten = $this->db->query("SELECT*FROM kabupaten WHERE deleted=0");
        $service = $this->db->query("SELECT*FROM service WHERE deleted=0");
        $gangguan = $this->db->query("SELECT*FROM gangguan WHERE deleted=0");
        $sifat = $this->db->query("SELECT*FROM sifat WHERE deleted=0");

        if ($action != null) {
            $notif=array(
            "is_read"=>1
            );
           $this->db->where('id_notif', $action);
           $this->db->update('notifikasi',$notif);
        }

         $data=array(
            "tiket"=>$ticketQuery->row(),
            "uptList"=>$upt->result(),
            "kecamatanList"=>$kecamatan->result(),
            "kabupatenList"=>$kabupaten->result(),
            "serviceList"=>$service->result(),
            "gangguanList"=>$gangguan->result(),
            "sifatList"=>$sifat->result(),
         ); 

         $this->Mypage2('isi/adm/tiket_detail', $data);
    }

        public function Verify()
             {

            $config['upload_path']          = './assets/images/solusi/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $_POST['id_tiket'];
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['file_solusi']['name'];

            if($upload_image){
              if ($this->upload->do_upload('file_solusi')) {
                 $solusiName = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/bahan');
                  }

              }else{
                $solusiName = 'default.png';
              }

            $data=array(
                "status"=>$_POST['status'],
                "file_solusi"=>$solusiName
            );
            $this->db->where('id_tiket', $_POST['id_tiket'] );
            $this->db->update('tiket',$data);
            
            $notifikasi=array(
                   "id_tiket"=>$_POST['id_tiket'],
                   "notif_to"=>$_POST['id_pt'],
                   "is_read"=> 0,
                   "notif_at"=>date('Y-m-d H:i:s'),
                   "status_ticket"=>$_POST['status']

            );

           $this->db->insert('notifikasi', $notifikasi);

            $this->session->set_flashdata('sukses',"berhasil");

            $link='adm/tiket/detail/'.$_POST['id_tiket']; 
            redirect($link);
    }

            public function inprogress()
    {
        $idUser=$this->session->userdata('id_user');
        $ticket= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.status IN ('Verified', 'New')
            ORDER BY tiket.status DESC");

         $data=array(
            
            "ticketList"=>$ticket->result()
        ); 
         $this->Mypage('isi/adm/tiket_inprogress', $data);
    }

    public function close()
    {
        $idUser=$this->session->userdata('id_user');
        $ticket= $this->db->query("SELECT*FROM tiket 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=tiket.id_kecamatan
            LEFT JOIN kabupaten ON kabupaten.id_kabupaten=kecamatan.id_kecamatan
            LEFT JOIN service ON service.id_service = tiket.id_service
            LEFT JOIN upt ON upt.id_upt= tiket.id_upt
            LEFT JOIN sifat ON sifat.id_sifat=tiket.id_sifat
            LEFT JOIN gangguan ON gangguan.id_gangguan=tiket.id_gangguan 
            LEFT JOIN pt ON pt.id_pt=tiket.id_pt
            WHERE tiket.status IN ('Closed', 'Resolved')");

         $data=array(
            
            "ticketList"=>$ticket->result()
        ); 
         $this->Mypage('isi/adm/tiket_close', $data);
    }

}
