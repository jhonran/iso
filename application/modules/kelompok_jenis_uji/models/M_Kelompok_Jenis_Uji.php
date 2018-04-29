<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Kelompok_Jenis_Uji extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_kelompok_jenis_uji(){
		return $this->db->get('t_kelompok_jenis_uji');
	}	
	
	function tambah_data_kelompok_jenis_uji($data){
        return $this->db->insert('t_kelompok_jenis_uji',$data);
    }

    function get_data_kelompok_jenis_uji($data){
        $this->db->where($data);
        return $this->db->get('t_kelompok_jenis_uji');
    }
    function edit_data_kelompok_jenis_uji($data,$edit){
        $this->db->where($data);
        return $this->db->update('t_kelompok_jenis_uji',$edit);
    }
    function hapus_data_kelompok_jenis_uji($data){
        $this->db->where($data);
        return $this->db->delete('t_kelompok_jenis_uji');
    }
}
