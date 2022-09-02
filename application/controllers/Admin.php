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
		$this->load->view('admin/data_absen_pegawai', $data);
	}

	function akunPegawai(){
		$data['data_all'] = $this->M_Absent->get_data_all_akun()->result();
		$this->load->view('admin/data_akun_pegawai', $data);
	}

}