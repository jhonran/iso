<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
Author Asep Suratno
*/
class M_Login extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
	function registrasi() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => get_hash($this->input->post('password'))
		);
		return $this->db->insert('user', $data);
	}

	function check_data() {
		return $this->db->get_where('user',array('username' => $this->input->post('username')));
	}

	function tambah_log_data($data) {
		return $this->db->insert('t_log_data',$data);
	}
}