<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 

*/
class M_Logout extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
	function tambah_log_data($data) {
		return $this->db->insert('t_log_data',$data);
	}
}