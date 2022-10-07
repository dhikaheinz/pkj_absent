<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DinasLuar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') == '') {
			redirect('user/index');
		}
		$this->load->model('M_Admin');
		$this->load->model('M_Absent');
    }

    function index(){
		function get_client_ip() {
			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
			else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
			else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			else if(getenv('HTTP_FORWARDED'))
			   $ipaddress = getenv('HTTP_FORWARDED');
			else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
			else
				$ipaddress = 'IP tidak dikenali';
			return $ipaddress;
		}
		// echo "Your IP Address :". get_client_ip();
		// $ipaddress = "116.254.129.82";
		$ipaddress = get_client_ip();
		$ipExplode = explode(".",$ipaddress);
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '2') {
			if ($ipExplode[0] == 116 && $ipExplode[1] == 254 && $ipExplode[2] == 124 || $ipExplode[2] == 125) {
				redirect('home');
			} else {
				$data['data_pegawai'] = $this->M_Absent->get_data_pegawai()->row();
				$data['data_absent'] = $this->M_Absent->get_data_absent()->row();
				$data['data_today'] = $this->M_Absent->get_data_today()->result_array();
				$data['data_today_row'] = $this->M_Absent->get_data_today()->row();
				$data['data_today_foto'] = $this->M_Absent->get_data_today()->result_array();
				$data['get_data_doc'] = $this->M_Absent->get_data_doc()->result_array();
				$data['get_data_foto'] = $this->M_Absent->get_data_foto()->result_array();
				// $data['data_all'] = $this->M_Absent->get_data_all_akun()->result();
				// print_r($data['data_today_foto']);
				$this->load->view('dinasLuar/index', $data);
			}
		}elseif ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '1') {
			redirect('admin');
		}
	}

    function absentMasukDL(){
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
	
	function absentKeluarDL($id){
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

}