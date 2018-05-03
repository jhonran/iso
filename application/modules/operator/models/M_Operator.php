<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Operator extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_operator(){
		return $this->db->get('user');
	}
    function data_level_user() {
        return $this->db->get('t_level_user');
    }	
	
	function tambah_data_operator($data){
        return $this->db->insert('user',$data);
    }

    function get_data_operator($data){
        $this->db->where($data);
        return $this->db->get('user');
    }
    function edit_data_operator($data,$edit){
        $this->db->where($data);
        return $this->db->update('user',$edit);
    }
    function hapus_data_operator($data){
        $this->db->where($data);
        return $this->db->delete('user');
    }
    function check_data() {
        return $this->db->get_where('user',array('username' => $this->input->post('username')));
    }
}
