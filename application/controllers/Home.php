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
		$this->load->view('home/index', $data);
	}

	function absentMasuk(){
		$data_absent_masuk = array(
		'absent_nip' => $this->session->userdata('user_nip'),
		'attendance_entry' => date('H:i:s'),
		'location_entry' => $this->input->post("lokasi_user"),
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d H:i:s')
		);
            
		$this->M_Absent->insert_absent_masuk($data_absent_masuk);
		redirect('home');
	}

	function absentKeluar(){
		$data_absent_masuk = array(
		'absent_nip' => $this->session->userdata('user_nip'),
		'attendance_entry' => date('H:i:s'),
		'location_entry' => $this->input->post("lokasi_user"),
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('H:i:s')
		);
            
		$this->M_Absent->insert_absent_masuk($data_absent_masuk);
		redirect('home');
	}
}