<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Dashboard extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		if($this->session->userdata('is_login') == TRUE) {
			$data['title'] = 'Dashboard';
			$this->load->view('dashboard', $data);
		} else {
			$this->load->view('login');
		}
	}
}