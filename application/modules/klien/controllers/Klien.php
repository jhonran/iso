<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Klien extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_klien');
	}
	public function index() {
		$data['title'] = 'Data Klien';
		$data['content'] = 'klien';
		$data['datatables'] = $this->m_klien->data_klien();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_klien() {
		$this->form_validation->set_rules('nama_klien', 'Nama Klien', 'trim|required');
		$this->form_validation->set_rules('kontak_klien', 'Kontak Klien', 'trim|required');
		$this->form_validation->set_rules('telepon_klien', 'Telepon Klien', 'trim|required');
		$this->form_validation->set_rules('alamat_klien', 'Alamat Klien', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tambah_klien = array(
            	'nama_klien' => $this->input->post('nama_klien'),
            	'kontak_klien' => $this->input->post('kontak_klien'),
            	'telepon_klien' => $this->input->post('telepon_klien'),
            	'alamat_klien' => $this->input->post('alamat_klien')
        	);
        	$this->m_klien->tambah_data_klien($tambah_klien);
		}
    }
    function edit_klien(){
		$this->form_validation->set_rules('klien', 'Nama Klien', 'trim|required');
		$this->form_validation->set_rules('kontak', 'Kontak Klien', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon Klien', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Klien', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data  = array('id_klien' =>$this->input->post('id_klien'));
        	$edit = array(
            	'nama_klien' => $this->input->post('klien'),
            	'kontak_klien' => $this->input->post('kontak'),
            	'telepon_klien' => $this->input->post('telepon'),
            	'alamat_klien' => $this->input->post('alamat')
        	);
        	$this->m_klien->edit_data_klien($data,$edit);
		}
    	
        
    }
    function edit_data_klien($id){
        $data  = array('id_klien'=>$id);
        $get = $this->m_klien->get_data_klien($data)->row();
        echo json_encode($get);
    }

    function hapus_klien($id){
        $data  = array('id_klien'=>$id);
        $this->m_klien->hapus_data_klien($data);
    }
}