<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    function get_data_riwayat_kunjungan_all(){
        $this->db->select('*');
        $this->db->from('pasien_kunjungan');
        $this->db->order_by("tgl_kunjungan", "desc");

        return $query = $this->db->get();
    }
}