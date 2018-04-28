<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_login');
	}
	public function index() {
		if($this->session->userdata('is_login') == TRUE) {
			$this->load->view('dashboard');
		} else {
			$this->load->view('login');
		}
	}
	public function proses_login() {
		if ($this->m_login->check_data()->num_rows() == 1) {
				$db = $this->m_login->check_data()->row();
				if(hash_verified($this->input->post('password'), $db->password)) {
					$session = array(
						'is_login' => true,
						'is_username' => $db->username,
						'is_id' => $db->id_user
					);	
					$this->session->set_userdata($session);
					redirect('dashboard','refresh');
				} else {
					$this->session->set_flashdata('pesan', 'Maaf Password Salah');
					redirect('login','refresh');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Maaf Email tidak terdaftar');
				redirect('login','refresh');
			}
	}
}