<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Logout extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('is_nama');
		$this->session->unset_userdata('is_id');
		session_destroy();
		redirect('login','refresh');
	}
}