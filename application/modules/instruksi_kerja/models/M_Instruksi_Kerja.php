<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Instruksi_Kerja extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_instruksi_kerja(){
		return $this->db->get('t_instruksi_kerja');
	}	
	
	function tambah_data_instruksi_kerja($data){
        return $this->db->insert('t_instruksi_kerja',$data);
    }

    function get_data_instruksi_kerja($data){
        $this->db->where($data);
        return $this->db->get('t_instruksi_kerja');
    }
    function edit_data_instruksi_kerja($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_instruksi_kerja',$edit);
    }
    function hapus_data_instruksi_kerja($data){
        $this->db->where($data);
        return $this->db->delete('t_instruksi_kerja');
    }
    
}
