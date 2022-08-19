<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == '2') {
			redirect('user/index');
		}else{
			$this->load->view('admin/index');
		}
		$this->load->model('M_Admin');
    }

    public function index()
	{
		$this->load->view('admin/index');
	}
	
}