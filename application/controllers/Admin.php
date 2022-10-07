<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') == '') {
			redirect('user/index');
		}
		$this->load->model('M_Admin');
		$this->load->model('M_Absent');
    }

    public function index()
	{
		$this->load->view('admin/index');
	}

	function dataAbsen(){
		$data['data_all'] = $this->M_Absent->get_data_all_without()->result();
		// print_r($data['data_all']);
		$this->load->view('admin/data_absen_pegawai', $data);
	}

	function akunPegawai(){
		$data['data_all'] = $this->M_Absent->get_data_all_akun()->result();
		$this->load->view('admin/data_akun_pegawai', $data);
		// print_r($data['data_all']);
	}


	function detail_profil($nip){
		$data['get_data_profil'] = $this->M_Admin->detail_profil($nip)->row();
		$data['get_data_profil_unit'] = $this->M_Admin->detail_profil_unit($nip)->row();
		// print_r($data['get_data_profil']);
		$this->load->view('admin/detail_profil', $data);
	}

	function update_profil($nip){
		$folderPathProfil = "upload/foto/profile/".date("Y")."/".date("m")."/";
        if(!is_dir($folderPathProfil)){
            mkdir($folderPathProfil, 0777, true);
        }

		if(!empty($_FILES['files']['name'])){
		 
			$_FILES['file']['name'] = $_FILES['files']['name'];
			$_FILES['file']['type'] = $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['files']['error'];
			$_FILES['file']['size'] = $_FILES['files']['size'];

			$temp = explode(".",$_FILES['files']['name']);
			$ext = end($temp);
			$newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);

			$config['upload_path'] = $folderPathProfil;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			$config['max_size'] = '20000'; // max_size in kb
			$config['file_name'] = $newname;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){
			$uploadData = $this->upload->data();
			$image_path = $folderPathProfil ."$uploadData[file_name]";
			}
		}
		
		$secretPass = $this->input->post("pass");
		$secretPass2 = $this->input->post("pass2");

		$passInput = "";

		if (!empty($secretPass)) {
			$passInput = password_hash($secretPass, PASSWORD_DEFAULT);
		} elseif (!empty($secretPass2)) {
			$passInput = $secretPass2;
		}
		
		$data = array(
			'foto_profil' => $image_path,
			'pass' => $passInput,
			'email' => $this->input->post("email"),
			'priv_unit' => $this->input->post("priv_unit"),
		);

		$data2 = array(
			'profile_email' => $this->input->post("email"),
			'work_unit' => $this->input->post("work_unit"),
		);
		
		$this->M_Admin->editProfil($nip, $data);
		$this->M_Admin->editProfil_unit($nip, $data2);
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Perubahan Telah Disimpan</p>');
		redirect('admin/akunPegawai');
	}
}