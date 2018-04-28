<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Permintaan_Analisis extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_permintaan_analisis');
	}
	public function index() {
		$data['title'] = 'Data Permintaan Analisis';
		$data['content'] = 'permintaan_analisis';
		$data['datatables'] = $this->m_permintaan_analisis->data_permintaan_analisis();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_permintaan() {

		$this->form_validation->set_rules('id_klien', 'ID Klien', 'trim|required');
		$this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'trim|required');
		$this->form_validation->set_rules('tanggal_permintaan', 'Tanggal Permintaan', 'trim|required');
		$this->form_validation->set_rules('nama_sample', 'nama_sample', 'trim|required');
		$this->form_validation->set_rules('manager_teknis', 'Manage Teknis', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tambah_permintaan = array(
            	'id_klien' => $this->input->post('id_klien'),
            	'tanggal_deadline' => $this->input->post('tanggal_deadline'),
            	'tanggal_permintaan' => $this->input->post('tanggal_permintaan'),
            	'nama_sample' => $this->input->post('nama_sample'),
            	'manager_teknis' => $this->input->post('manager_teknis')
        	);
        	$this->m_permintaan_analisis->tambah_data_permintaan_analisis($tambah_permintaan);
		}
    }
    function edit_permintaan(){
    	$this->form_validation->set_rules('klien', 'ID Klien', 'trim|required');
		$this->form_validation->set_rules('deadline', 'Tanggal Deadline', 'trim|required');
		$this->form_validation->set_rules('permintaan', 'Tanggal Permintaan', 'trim|required');
		$this->form_validation->set_rules('sample', 'nama_sample', 'trim|required');
		$this->form_validation->set_rules('teknis', 'Manage Teknis', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data  = array('id_permintaan_analisis'=>$this->input->post('id_permintaan'));
        	$edit = array(
            	'id_klien' => $this->input->post('klien'),
            	'tanggal_deadline' => $this->input->post('deadline'),
            	'tanggal_permintaan' => $this->input->post('permintaan'),
            	'nama_sample' => $this->input->post('sample'),
            	'manager_teknis' => $this->input->post('teknis')
        	);
        	$this->m_permintaan_analisis->edit_data_permintaan_analisis($data,$edit);
		}
    	
        
    }
    function edit_permintaan_analisis($id){
        $data  = array('id_permintaan_analisis'=>$id);
        $get = $this->m_permintaan_analisis->get_data_permintaan_analisis($data)->row();
        echo json_encode($get);
    }

    function hapus_permintaan($id){
        $data  = array('id_permintaan_analisis'=>$id);
        $this->m_permintaan_analisis->hapus_data_permintaan_analisis($data);
    }
}