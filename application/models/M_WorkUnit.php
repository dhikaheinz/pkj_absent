<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_WorkUnit extends CI_Model {

    function get_data_all_akun_unit(){
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->where('work_unit', $this->session->userdata('priv_unit'));
        return $query = $this->db->get();
    }

    function get_data_detail_unit($nip){
        $this->db->select('absent.updated_date AS tanggal, daily_job.job_nip, profile_name,
        absent.attendance_entry, absent.attendance_return, absent.location_entry,
        absent.location_return, daily_job.job_desc,
        daily_job.id_job, absent.status_absen_keluar, absent.status_absen_masuk, absent.absen_ket, profile.work_unit');
        $this->db->from('absent');
        $this->db->join('daily_job', 'absent.id_absent = daily_job.id_absent');
        $this->db->join('profile', 'absent.absent_nip = profile.profile_nip');
        $this->db->where('daily_job.job_nip', $nip);
        $this->db->order_by('absent.updated_date', 'desc');
        return $query = $this->db->get();
    }
}