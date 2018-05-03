<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Log_Data extends CI_Model {

    function __construct () {
	   $this->load->database();
    }

	function data_log(){
		return $this->db->get('t_log_data');
	}	
}
