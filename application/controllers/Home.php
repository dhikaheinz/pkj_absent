<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			redirect('user/index');
		}
		$this->load->model('M_User');
		$this->load->model('M_Pasien');
    }

	public function index()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('user/index');
		}else{
			$data['data_kunjungan_aktif'] = $this->M_Pasien->get_data_riwayat_kunjungan_aktif()->result_array();
			$data['data_pasien'] = $this->M_Pasien->get_data_pasien()->row();
			$this->load->view('home/index', $data);
		}
	}
}