<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Operator extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_operator');
	}
	public function index() {
		$data['title'] = 'Data User';
		$data['content'] = 'operator';
		$data['datatables'] = $this->m_operator->data_operator();
		$data['data_level_user'] = $this->m_operator->data_level_user();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_operator() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('id_level_user', 'Level User', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			if ($this->m_operator->check_data()->num_rows() == 1) {
				$this->index();
			} else {
				$tambah_operator = array(
            		'username' => $this->input->post('username'),
            		'password' => get_hash($this->input->post('password')),
            		'level_user' => $this->input->post('id_level_user')
        		);
        		$this->m_operator->tambah_data_operator($tambah_operator);	
			}
			
		}
    }
    function edit_operator(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		//$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('id_level_user', 'Level User', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			if ($this->m_operator->check_data()->num_rows() == 1) {
				$db = $this->m_operator->check_data()->row();
				if ($this->input->post('password') == '' || $this->input->post('password') == null) {
					$data  = array('id_user' =>$this->input->post('id_user'));
        			$edit = array(
            			'username' => $this->input->post('username'),
            			'password' => $db->password,
            			'level_user' => $this->input->post('id_level_user')
        			);
        			$this->m_operator->edit_data_operator($data,$edit);	
				} else {
					$data  = array('id_user' =>$this->input->post('id_user'));
        			$edit = array(
            			'username' => $this->input->post('username'),
            			'password' => get_hash($this->input->post('password')),
            			'level_user' => $this->input->post('id_level_user')
        			);
        			$this->m_operator->edit_data_operator($data,$edit);
				}
			} else {
				$data  = array('id_user' =>$this->input->post('id_user'));
        		$edit = array(
            		'username' => $this->input->post('username'),
            		'password' => get_hash($this->input->post('password')),
            		'level_user' => $this->input->post('id_level_user')
        		);
        		$this->m_operator->edit_data_operator($data,$edit);
			}
			
		}
    	
        
    }
    function edit_data_operator($id){
        $data  = array('id_user'=>$id);
        $get = $this->m_operator->get_data_operator($data)->row();
        echo json_encode($get);
    }

    function hapus_operator($id){
        $data  = array('id_user'=>$id);
        $this->m_operator->hapus_data_operator($data);
    }
}