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
    
    function data_absent_kegiatan_file(){
        $folderPath = "upload/file/".date("Y")."/".date("m")."/";
        if(!is_dir($folderPath)){
            mkdir($folderPath, 0777, true);
        }
        
        $image_path = array();

        $count = count($_FILES['files']['name']);
   
        for($i=0;$i<$count;$i++){
   
          if(!empty($_FILES['files']['name'][$i])){
   
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
            $temp = explode(".",$_FILES['files']['name'][$i]);
            $ext = end($temp);
            $newname = round(microtime(true)) . '_'. uniqid() . '.' . end($temp);

            $config['upload_path'] = $folderPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '20000'; // max_size in kb
            $config['file_name'] = $newname;

            $this->load->library('upload',$config); 

            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $image_path[] = $folderPath ."$uploadData[file_name]";
            }
          }
        }

        $filepath = implode("#",$image_path);
        
        if(!empty($filepath)){
            $rec = array(
                'id_absent' => $this->input->post("id_absent"),
                'doc_nip' => $this->session->userdata('user_nip'),
                'doc_name' => $filepath,
                'created_by' => $this->session->userdata('id_user'),
                'updated_date' => date('Y-m-d')
            );
            $this->db->insert('document', $rec);
          }
    }
}