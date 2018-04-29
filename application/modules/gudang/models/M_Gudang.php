<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Gudang extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_gudang(){
		return $this->db->get('t_gudang');
	}	
	
	function tambah_data_gudang($data){
        return $this->db->insert('t_gudang',$data);
    }

    function get_data_gudang($data){
        $this->db->where($data);
        return $this->db->get('t_gudang');
    }
    function edit_data_gudang($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_gudang',$edit);
    }
    function hapus_data_gudang($data){
        $this->db->where($data);
        return $this->db->delete('t_gudang');
    }
    
}
