<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			redirect('home/index');
		}else if ($this->session->userdata('status') == 'admin') {
			redirect('admin/index');
		}
		$this->load->view('login/index_login');
	}

	function aksi_login(){
		$user_nip = $this->input->post('user_nip');
		$pass = $this->input->post('pass');

		// $ipaddress = '116.254.124.44';
		// // $ipaddress = '';
		// // if (getenv('HTTP_CLIENT_IP')){
		// // 	$ipaddress = getenv('HTTP_CLIENT_IP');
		// // }
		// // else if(getenv('HTTP_X_FORWARDED_FOR')){
		// // 	$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		// // }
		// // else if(getenv('HTTP_X_FORWARDED')){
		// // 	$ipaddress = getenv('HTTP_X_FORWARDED');
		// // }
		// // else if(getenv('HTTP_FORWARDED_FOR')){
		// // 	$ipaddress = getenv('HTTP_FORWARDED_FOR');
		// // }
		// // else if(getenv('HTTP_FORWARDED')){
		// // 	$ipaddress = getenv('HTTP_FORWARDED');
		// // }
		// // else if(getenv('REMOTE_ADDR')){
		// // 	$ipaddress = getenv('REMOTE_ADDR');
		// // }
		// // else{
		// // 	$ipaddress = 'IP tidak dikenali';
		// // }
		// $poltekkes = '';
		// $ipExplode = explode(".",$ipaddress);
		// if($ipExplode[0] == 116 && $ipExplode[1] == 254 && $ipExplode[2] == 124 || $ipExplode[2] == 125){
		// 	$poltekkes = 'lokal';
		// }else{
		// 	$poltekkes = 'luar';
		// }
		// if (strlen($pass) > "50") {
			$result = $this->db->get_where('users', array('user_nip' => $user_nip));
			$data_user = $result->row();
			$secretPoltekkes = password_verify($pass, $data_user->pass);
			if($result->num_rows() > 0 && $secretPoltekkes > 0){
				// foreach ($data_user as $row) {
				$data_session = array(
					'id_user' => $data_user->id_user,
					'user_nip' => $user_nip,
					'level' => $data_user->level,
					'email' => $data_user->email,
					'foto_profil' => $data_user->foto_profil,
					'priv_unit' => $data_user->priv_unit,
					'status' => "login",
					// 'lokasi' => $poltekkes
					);
	
				$this->session->set_userdata($data_session);
				// }
				$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-green-600 my-3 p-2 rounded-md">Berhasil Login</p>');
				redirect('home');
	
			}else{
				$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-red-500 my-3 p-2 rounded-md">Data NIP Dan Password Salah</p>');
				redirect('user/index');
			}
		// } else {
		// 	$result = $this->db->get_where('users', array('user_nip' => $user_nip, 'pass' => $pass));
		// 	$data_user = $result->row();
		// 	// $secretPoltekkes = password_verify($pass, $data_user->pass);
		// 	if($result->num_rows() > 0){
		// 		// foreach ($data_user as $row) {
		// 		$data_session = array(
		// 			'id_user' => $data_user->id_user,
		// 			'user_nip' => $user_nip,
		// 			'level' => $data_user->level,
		// 			'email' => $data_user->email,
		// 			'foto_profil' => $data_user->foto_profil,
		// 			'status' => "login",
		// 			// 'lokasi' => $poltekkes
		// 			);
	
		// 		$this->session->set_userdata($data_session);
		// 		// }
		// 		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-green-600 my-3 p-2 rounded-md">Berhasil Login</p>');
		// 		redirect('home');
	
		// 	}else{
		// 		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-red-500 my-3 p-2 rounded-md">Data NIP Dan Password Salah</p>');
		// 		redirect('user/index');
		// 	}
		// }
	}

	// function halaman(){
	// 	if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '2' && $this->session->userdata('lokasi') == 'poltekkes') {
	// 		redirect('home/index');
	// 	}elseif ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '2' && $this->session->userdata('lokasi') == 'luar') {
	// 		redirect('dinasluar');
	// 	}elseif ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '1') {
	// 		redirect('admin');
	// 	}else {
	// 		redirect('user');
	// 	}
	// }

	function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
}