<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 

*/
class M_Menu extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function data_log() {
		return $this->db->get('t_menu');
	}
}