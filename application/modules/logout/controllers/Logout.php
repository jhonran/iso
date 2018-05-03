<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Logout extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_logout');
	}
	public function index() {
		$tambah_log_data = array(
			'log_date' => date('Y-m-d'),
			'log_user' => $this->session->userdata('is_username'),
			'log_desc' => 'logout' );
		$this->m_logout->tambah_log_data($tambah_log_data);
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('is_username');
		$this->session->unset_userdata('is_id');
		$this->session->unset_userdata('is_level_user');
		session_destroy();
		redirect('login','refresh');
	}
}