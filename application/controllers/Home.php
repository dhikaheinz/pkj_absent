<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') == '') {
			redirect('user/index');
		}
		$this->load->model('M_User');
		$this->load->model('M_Absent');
    }

	public function index()
	{
		$ipaddress = '116.254.124.44';
		// if (getenv('HTTP_CLIENT_IP')){
		// 	$ipaddress = getenv('HTTP_CLIENT_IP');
		// }
		// else if(getenv('HTTP_X_FORWARDED_FOR')){
		// 	$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		// }
		// else if(getenv('HTTP_X_FORWARDED')){
		// 	$ipaddress = getenv('HTTP_X_FORWARDED');
		// }
		// else if(getenv('HTTP_FORWARDED_FOR')){
		// 	$ipaddress = getenv('HTTP_FORWARDED_FOR');
		// }
		// else if(getenv('HTTP_FORWARDED')){
		// 	$ipaddress = getenv('HTTP_FORWARDED');
		// }
		// else if(getenv('REMOTE_ADDR')){
		// 	$ipaddress = getenv('REMOTE_ADDR');
		// }
		// else{
		// 	$ipaddress = 'IP tidak dikenali';
		// }
		$ipExplode = explode(".",$ipaddress);
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '2') {
			if ($ipExplode[0] == 116 && $ipExplode[1] == 254 && $ipExplode[2] == 124 || $ipExplode[2] == 125) {
				$data['data_pegawai'] = $this->M_Absent->get_data_pegawai()->row();
				$data['data_absent'] = $this->M_Absent->get_data_absent()->row();
				$data['data_today'] = $this->M_Absent->get_data_today()->result_array();
				$data['data_today_row'] = $this->M_Absent->get_data_today()->row();
				$data['data_today_foto'] = $this->M_Absent->get_data_today()->result_array();
				$data['get_data_doc'] = $this->M_Absent->get_data_doc()->result_array();
				$data['get_data_foto'] = $this->M_Absent->get_data_foto()->result_array();
				// print_r($data['data_today_row']);
				$this->load->view('home/index', $data);
			} else {
				redirect('dinasluar');
			}
		}elseif ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '1') {
			redirect('admin');
		}
	}

	public function lihatKegiatan()
	{
		$data['data_pegawai'] = $this->M_Absent->get_data_pegawai()->row();
		$data['data_absent'] = $this->M_Absent->get_data_absent()->row();
		$data['data_all'] = $this->M_Absent->get_data_all()->result();
		$data['data_all_foto'] = $this->M_Absent->get_data_all()->result_array();
		$this->load->view('home/lihat_kegiatan', $data);
	}

	function absentMasuk(){
		$data_absent_masuk = array(
		'absent_nip' => $this->session->userdata('user_nip'),
		'attendance_entry' => date('H:i:s'),
		'location_entry' => $this->input->post("lokasi_user"),
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
            
		$this->M_Absent->insert_absent_masuk($data_absent_masuk);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Absen Masuk Telah Disimpan</p>');
		redirect('home');
	}
	
	function absentKeluar($id){
		$data_absent_keluar = array(
			// 'absent_nip' => $this->session->userdata('user_nip'),
			'attendance_return' => date('H:i:s'),
			'location_return' => $this->input->post("lokasi_user_keluar"),
			'status' => "2",
			'created_by' => $this->session->userdata('id_user'),
		);
		
		$this->M_Absent->insert_absent_keluar($id, $data_absent_keluar);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Absen Keluar Telah Disimpan</p>');
		redirect('home');
	}

	function inputKegiatan(){
		$this->M_Absent->data_absent_delete($this->input->post("id_absent"));
		$folderPath = "upload/foto/".date("Y")."/".date("m")."/";
		$folderPathDoc = "upload/surat/".date("Y")."/".date("m")."/";
        if(!is_dir($folderPath)){
            mkdir($folderPath, 0777, true);
        }
        if(!is_dir($folderPathDoc)){
            mkdir($folderPathDoc, 0777, true);
        }
        
        $image_path = array();
        $doc_path = array();

        $count = count($_FILES['files']['name']);
        $countdoc = count($_FILES['filesdoc']['name']);
   
        for($i=0;$i<$count;$i++){
   
          if(!empty($_FILES['files']['name'][$i])){
   
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
            $temp = explode(".",$_FILES['files']['name'][$i]);
            $ext = end($temp);
            $newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);

            $config['upload_path'] = $folderPath;
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = '20000'; // max_size in kb
            $config['file_name'] = $newname;

            $this->load->library('upload',$config);
			$this->upload->initialize($config);

            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $image_path[] = $folderPath ."$uploadData[file_name]";
            }
          }
        }

        for($i=0;$i<$countdoc;$i++){
   
          if(!empty($_FILES['filesdoc']['name'][$i])){
   
            $_FILES['file']['name'] = $_FILES['filesdoc']['name'][$i];
            $_FILES['file']['type'] = $_FILES['filesdoc']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['filesdoc']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['filesdoc']['error'][$i];
            $_FILES['file']['size'] = $_FILES['filesdoc']['size'][$i];
  
            $temp = explode(".",$_FILES['filesdoc']['name'][$i]);
            $ext = end($temp);
            $newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);

            $config['upload_path'] = $folderPathDoc;
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = '20000'; // max_size in kb
            $config['file_name'] = $newname;

            $this->load->library('upload',$config);
			$this->upload->initialize($config);

            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $doc_path[] = $folderPathDoc ."$uploadData[file_name]";
            }
          }
        }

        $filepath = implode("#",$image_path);
        $filepathDoc = implode("#",$doc_path);

		$data_absent_kegiatan = array(
		'id_absent' => $this->input->post("id_absent"),
		'job_nip' => $this->session->userdata('user_nip'),
		'job_desc' => $this->input->post('job_desc'),
		'doc_file' => $filepath,
		'doc_file_ket' => $filepathDoc,
		'status_absent' => $this->input->post('status_absent'),
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
			
		$this->M_Absent->data_absent_kegiatan($data_absent_kegiatan);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Kegiatan Hari Ini Telah Disimpan</p>');
		redirect('home');
	}

	function inputKegiatanFile(){
		// $this->M_Absent->data_absent_delete($this->input->post("id_absent"));
		$folderPath = "upload/foto/".date("Y")."/".date("m")."/";
		$folderPathDoc = "upload/surat/".date("Y")."/".date("m")."/";
        if(!is_dir($folderPath)){
            mkdir($folderPath, 0777, true);
        }
        if(!is_dir($folderPathDoc)){
            mkdir($folderPathDoc, 0777, true);
        }
        
        $image_path = array();
        $doc_path = array();

        $count = count($_FILES['files']['name']);
        $countdoc = count($_FILES['filesdoc']['name']);

		if ($count >= 0) {
			for($i=0;$i<$count;$i++){
   
				if(!empty($_FILES['files']['name'][$i])){
		 
				  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
				  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
				  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
		
				  $temp = explode(".",$_FILES['files']['name'][$i]);
				  $ext = end($temp);
				  $newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);
	  
				  $config['upload_path'] = $folderPath;
				  $config['allowed_types'] = 'jpg|jpeg|png|pdf';
				  $config['max_size'] = '20000'; // max_size in kb
				  $config['file_name'] = $newname;
	  
				  $this->load->library('upload',$config);
				  $this->upload->initialize($config);
	  
				  if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$image_path[] = $folderPath ."$uploadData[file_name]";
				  }
				}
			  }
		}

		if ($countdoc >= 0) {
			for($i=0;$i<$countdoc;$i++){
   
				if(!empty($_FILES['filesdoc']['name'][$i])){
		 
				  $_FILES['file']['name'] = $_FILES['filesdoc']['name'][$i];
				  $_FILES['file']['type'] = $_FILES['filesdoc']['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES['filesdoc']['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES['filesdoc']['error'][$i];
				  $_FILES['file']['size'] = $_FILES['filesdoc']['size'][$i];
		
				  $temp = explode(".",$_FILES['filesdoc']['name'][$i]);
				  $ext = end($temp);
				  $newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);
	  
				  $config['upload_path'] = $folderPathDoc;
				  $config['allowed_types'] = 'jpg|jpeg|png|pdf';
				  $config['max_size'] = '20000'; // max_size in kb
				  $config['file_name'] = $newname;
	  
				  $this->load->library('upload',$config);
				  $this->upload->initialize($config);
	  
				  if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$doc_path[] = $folderPathDoc ."$uploadData[file_name]";
				  }
				}
			  }
		}

        $filepath = implode("#",$image_path);
        $filepathDoc = implode("#",$doc_path);

		$data_absent_kegiatan_file = array(
		'id_job' => $this->input->post("id_job"),
		'doc_nip' => $this->session->userdata('user_nip'),
		'doc_file_ket' => $filepathDoc,
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);

		$data_absent_kegiatan_foto = array(
		'id_job' => $this->input->post("id_job"),
		'foto_nip' => $this->session->userdata('user_nip'),
		'foto_file' => $filepath,
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
			
		$this->M_Absent->data_absent_kegiatan_file($data_absent_kegiatan_file);
		$this->M_Absent->data_absent_kegiatan_foto($data_absent_kegiatan_foto);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Kegiatan Hari Ini Telah Disimpan</p>');
		redirect('home');
	}

	function editKegiatan($id){
		$editKegiatan = array(
			'job_desc' => $this->input->post("job_desc")
		);
		
		$this->M_Absent->editKegiatan($id, $editKegiatan);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Perubahan Telah Disimpan</p>');
		redirect('home');
	}
}