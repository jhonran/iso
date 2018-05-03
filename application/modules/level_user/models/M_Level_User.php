<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Level_User extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_level_user(){
		return $this->db->get('t_level_user');
	}	
	
	function tambah_data_level_user($data){
        return $this->db->insert('t_level_user',$data);
    }

    function get_data_level_user($data){
        $this->db->where($data);
        return $this->db->get('t_level_user');
    }
    function edit_data_level_user($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_level_user',$edit);
    }
    function hapus_data_level_user($data){
        $this->db->where($data);
        return $this->db->delete('t_level_user');
    }
}
