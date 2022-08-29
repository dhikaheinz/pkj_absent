<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			redirect('user/index');
		}else if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '1') {
			redirect('admin/index');
		}
		$this->load->model('M_User');
		$this->load->model('M_Absent');
    }

	public function index()
	{
		$data['data_pegawai'] = $this->M_Absent->get_data_pegawai()->row();
		$data['data_absent'] = $this->M_Absent->get_data_absent()->row();
		$data['data_today'] = $this->M_Absent->get_data_today()->result();
		$this->load->view('home/index', $data);
	}

	public function lihatKegiatan()
	{
		$data['data_pegawai'] = $this->M_Absent->get_data_pegawai()->row();
		$data['data_absent'] = $this->M_Absent->get_data_absent()->row();
		$data['data_all'] = $this->M_Absent->get_data_all()->result();
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
		$folderPath = "upload/file/".date("Y")."/".date("m")."/";
        if(!is_dir($folderPath)){
            mkdir($folderPath, 0777, true);
        }
        
        $image_path = array();

        $count = count($_FILES['files']['name']);
   
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
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '20000'; // max_size in kb
            $config['file_name'] = $newname;

            $this->load->library('upload',$config); 

            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $image_path[] = $folderPath ."$uploadData[file_name]";
            }
          }
        }

        $filepath = implode("#",$image_path);

		$data_absent_kegiatan = array(
		'id_absent' => $this->input->post("id_absent"),
		'job_nip' => $this->session->userdata('user_nip'),
		'job_desc' => $this->input->post('job_desc'),
		'doc_file' => $filepath,
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
			
		$this->M_Absent->data_absent_kegiatan($data_absent_kegiatan);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Kegiatan Hari Ini Telah Disimpan</p>');
		redirect('home');
	}
}