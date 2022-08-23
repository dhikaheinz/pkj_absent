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
}