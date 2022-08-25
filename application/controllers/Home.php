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
		$this->load->view('home/index', $data);
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
		$data_absent_kegiatan = array(
		'id_absent' => $this->input->post("id_absent"),
		'job_nip' => $this->session->userdata('user_nip'),
		'job_desc' => $this->input->post('job_desc'),
		'created_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
			
		$this->M_Absent->data_absent_kegiatan($data_absent_kegiatan);
		$this->M_Absent->data_absent_kegiatan_file();
		$this->session->set_flashdata('success', '<p class="hide-it text-center text-white bg-[#64b3f4] my-3 p-2 rounded-md">Kegiatan Hari Ini Telah Disimpan</p>');
		redirect('home');
	}
}