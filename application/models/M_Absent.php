<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Absent extends CI_Model {

    function get_data_pegawai(){
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('profile_nip', $this->session->userdata('user_nip'));

        return $query = $this->db->get();
    }

    function get_data_absent(){
        $this->db->select('*');
        $this->db->from('absent');
        $this->db->where('absent_nip', $this->session->userdata('user_nip'));
        $this->db->where('updated_date', date('Y-m-d'));

        return $query = $this->db->get();

        // if ($query->num_rows() > 0) {
        //     return $query->row();
        // } else {
        //     return false;
        // }
    }

    function insert_absent_masuk($data){
        $this->db->insert('absent', $data);
    }
    
    function insert_absent_keluar($id, $data){
        $this->db->where('id_absent', $id);
        $this->db->update('absent', $data);
    }

    function data_absent_kegiatan($data){
        $this->db->insert('daily_job', $data);
    }
    
    function data_absent_delete($id){
        $this->db->delete('daily_job', array('id_absent' => $id)); 
    }

    function get_data_today(){
        $this->db->select('*');
        $this->db->from('absent');
        $this->db->join('daily_job', 'absent.id_absent = daily_job.id_absent');
        $this->db->where('absent.updated_date', date('Y-m-d'));
        $this->db->where('absent.absent_nip', $this->session->userdata('user_nip'));
        return $query = $this->db->get();
    }

    function get_data_all(){
        $this->db->select('*');
        $this->db->from('absent');
        $this->db->join('daily_job', 'absent.id_absent = daily_job.id_absent');
        $this->db->where('absent.absent_nip', $this->session->userdata('user_nip'));
        return $query = $this->db->get();
    }
}