<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Level_User extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_level_user');
	}
	public function index() {
		$data['title'] = 'Data Hak Akses';
		$data['content'] = 'level_user';
		$data['datatables'] = $this->m_level_user->data_level_user();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_level_user() {
		$this->form_validation->set_rules('nama_level_user', 'Nama Hak Akses', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tambah_level_user = array(
            	'nama_level_user' => $this->input->post('nama_level_user')
        	);
        	$this->m_level_user->tambah_data_level_user($tambah_level_user);
		}
    }
    function edit_level_user(){
		$this->form_validation->set_rules('id_level_user', 'ID Level User', 'trim|required');
		$this->form_validation->set_rules('nama_level_user', 'Nama Hak Akses', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data  = array('id_level_user' =>$this->input->post('id_level_user'));
        	$edit = array(
            	'nama_level_user' => $this->input->post('nama_level_user')
        	);
        	$this->m_level_user->edit_data_level_user($data,$edit);
		}
    	
        
    }
    function edit_data_level_user($id){
        $data  = array('id_level_user'=>$id);
        $get = $this->m_level_user->get_data_level_user($data)->row();
        echo json_encode($get);
    }

    function hapus_level_user($id){
        $data  = array('id_level_user'=>$id);
        $this->m_level_user->hapus_data_level_user($data);
    }
}