<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkUnit extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('status') == '') {
			redirect('user/index');
		}
		$this->load->model('M_Admin');
		$this->load->model('M_Absent');
		$this->load->model('M_WorkUnit');
    }

    public function index()
	{
        if ($this->session->userdata('priv_unit') == '') {
			redirect('user/index');
		}
        $data['data_all'] = $this->M_WorkUnit->get_data_all_akun_unit()->result();
        // print_r($data['data_all']);
		$this->load->view('workUnit/index', $data);
	}

	function detailWorkUnit($nip){
        if ($this->session->userdata('priv_unit') == '') {
			redirect('user/index');
		}
		$data['data_all'] = $this->M_WorkUnit->get_data_detail_unit($nip)->result();
		$data['data_all_row'] = $this->M_WorkUnit->get_data_detail_unit($nip)->row();
		// print_r($data['data_all']);
		$this->load->view('workUnit/detail_workunit', $data);
	}

	function akunPegawai(){
		$data['data_all'] = $this->M_Absent->get_data_all_akun()->result();
		$this->load->view('admin/data_akun_pegawai', $data);
	}

}