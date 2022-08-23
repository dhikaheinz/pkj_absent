<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Absent extends CI_Model {

    function get_data_pegawai(){
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('profile_nip', $this->session->userdata('user_nip'));

        return $query = $this->db->get();
    }
}