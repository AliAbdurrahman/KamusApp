<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {
	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		
	}

	//bikin method baru untuk mengambil data kaamus
	public function getAllKamus(){ 
		$data = array(); // menjadikan data sebagai array

		//proses query untuk mengambil data dari tb_kamus
		$sql = "SELECT * FROM tb_kamus  ORDER by id_kamus DESC";
        //proses eksekusi query
		$q = $this->db->query($sql);
		//apakah  data nya kosong atau tidak 
		if($q->num_rows() > 0){				
			//kondisi ketika data tidak kosong
			//menampilkan data result nya true
			$data['result'] = 'true';
			//menampilkan msg nya data kamus
			$data['msg'] = 'Data  kamus';
			//menampilkan data request
			$data['data'] = $q->result();
		}else{
			//apabila data nya kosong
			//menampilkan nilai result false
			$data['result'] = 'false';
			//menampilkan message tidak ada data kamus
			$data['msg'] = 'Tidak ada data kamus';
		}
		//menampilkan hasil data kedalam bentuk json
		echo json_encode($data);
	}	
}

//http://localhost/KamusApp/index.php/api/getAllKamus
	
