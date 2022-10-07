<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    function detail_profil($nip){
		$this->db->select();
		$this->db->from('users');
		$this->db->where('user_nip', $nip);
        return $query = $this->db->get();
	}

    function detail_profil_unit($nip){
		$this->db->select();
		$this->db->from('profile');
		$this->db->where('profile_nip', $nip);
        return $query = $this->db->get();
	}

    function editProfil($nip, $data){
		$this->db->where('user_nip', $nip);
        $this->db->update('users', $data);
	}

    function editProfil_unit($nip, $data2){
		$this->db->where('profile_nip', $nip);
        $this->db->update('profile', $data2);
	}
}