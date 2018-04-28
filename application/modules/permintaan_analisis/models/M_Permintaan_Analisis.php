<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Permintaan_Analisis extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_permintaan_analisis(){
		return $this->db->get('t_permintaan_analisis');
	}	
	
	function tambah_data_permintaan_analisis($data){
        return $this->db->insert('t_permintaan_analisis',$data);
    }

    function get_data_permintaan_analisis($data){
        $this->db->where($data);
        return $this->db->get('t_permintaan_analisis');
    }
    function edit_data_permintaan_analisis($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_permintaan_analisis',$edit);
    }
    function hapus_data_permintaan_analisis($data){
        $this->db->where($data);
        return $this->db->delete('t_permintaan_analisis');
    }
}
