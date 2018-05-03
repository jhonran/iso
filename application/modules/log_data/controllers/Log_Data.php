<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Log_Data extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_log_data');
	}
	public function index() {
		$data['title'] = 'Data Log';
		$data['content'] = 'log_data';
		$data['datatables'] = $this->m_log_data->data_log();
		$this->load->view('dashboard/dashboard',$data);
	}
}