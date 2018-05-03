<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class DataBase extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['title'] = 'Database';
		$data['content'] = 'database';
		$this->load->view('dashboard/dashboard',$data);
	}
	function manual_database() {
		$this->load->dbutil();
        $aturan = array(    
        	'format'      => 'zip',            
            'filename'    => 'my_database.sql'
        );
 
 
        $backup = $this->dbutil->backup($aturan);
 
        $nama_database = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $simpan = 'backup/'.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
 
        $this->load->helper('download');
        force_download($nama_database, $backup);
	}
}