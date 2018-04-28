<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Klien extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_klien(){
		return $this->db->get('t_klien');
	}	
	
	function tambah_data_klien($data){
        return $this->db->insert('t_klien',$data);
    }

    function get_data_klien($data){
        $this->db->where($data);
        return $this->db->get('t_klien');
    }
    function edit_data_klien($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_klien',$edit);
    }
    function hapus_data_klien($data){
        $this->db->where($data);
        return $this->db->delete('t_klien');
    }
}
