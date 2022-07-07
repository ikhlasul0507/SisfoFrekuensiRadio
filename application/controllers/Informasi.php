<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends My_Controller {

	function __construct(){
		parent::__construct();		
	}

	public function index()
	{
		$dateEnd = date('Y-m-d');
		$dateStart = date('Y-m-d', strtotime('-2 days', strtotime($dateEnd)));

		$update_harga = $this->db->query("SELECT*FROM update_harga 
        LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi 
		WHERE bahan.deleted=0 AND update_harga.tgl_harga BETWEEN '$dateStart' AND '$dateEnd'
		ORDER BY update_harga.tgl_harga DESC, lokasi.nm_lokasi ASC");

         $data=array(
            "update"=>$update_harga->result(),
        );
		 $this->load->view('isi/front/home',$data);
	}

	public function about()
	{
		 $this->load->view('isi/front/about');
	}

	public function kontak()
	{
		 $this->load->view('isi/front/kontak');
	}

	public function statistik_wilayah()
	{
		
		if(isset($_POST['id_lokasi']) )
        {
            $lokasi = $_POST['id_lokasi'];
			$date = $_POST['tgl'];
        }else{
            $lokasi = 1;
			$date = date('Y-m-d');
        }

		$update_harga = $this->db->query("SELECT*FROM update_harga 
        LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi
        WHERE bahan.deleted=0 AND lokasi.id_lokasi='$lokasi' AND update_harga.tgl_harga='$date'");

         $data=array(
            "update"=>$update_harga->result(),
			"tgl" => $date,
			"wilayah"=>$update_harga->result_array(),
        );
		 $this->load->view('isi/front/statistik_wilayah',$data);
	}

	public function statistik_komoditi()
	{
		
		if(isset($_POST['id_bahan']) )
        {
            $lokasi = $_POST['id_bahan'];
			$date = $_POST['tgl'];
			$update_harga = $this->db->query("SELECT*FROM update_harga 
			LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
			LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi
			WHERE bahan.deleted=0 AND bahan.id_bahan='$lokasi' AND update_harga.tgl_harga='$date'");
			
			$data = array(
						"update"=>$update_harga->result(),
						"tgl" => $date,
						"wilayah"=>$update_harga->result_array(),
					);

        }else{
            $data = array(
						"update"=>[],
						"tgl" => '',
						"wilayah"=>[],
					);
        }

	

		 $this->load->view('isi/front/statistik_komiditi',$data);
	}
	
}
