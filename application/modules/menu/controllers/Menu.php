<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Menu extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_menu');
	}
	public function index() {
		$data['datatables'] = $this->m_menu->data_log();
		$this->load->view('menu', $data);
	}
}