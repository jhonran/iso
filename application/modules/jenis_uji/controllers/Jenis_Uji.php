<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Jenis_Uji extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_jenis_uji');
	}
	public function index() {
		$data['title'] = 'Data Jenis Uji';
		$data['content'] = 'jenis_uji';
		$data['datatables'] = $this->m_jenis_uji->data_jenis_uji();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_jenis_uji() {
		$this->form_validation->set_rules('kelompok_jenis_uji', 'Kelompok Jenis Uji', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('nama_singkat', 'Nama Singkat', 'trim|required');
		$this->form_validation->set_rules('rumus', 'Rumus', 'trim|required');
		$this->form_validation->set_rules('hasil', 'Hasil', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('ref_method', 'ref_method', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tambah_jenis_uji = array(
            	'id_kelompok_jenis_uji' => $this->input->post('kelompok_jenis_uji'),
            	'nama_lengkap' => $this->input->post('nama_lengkap'),
            	'nama_singkat' => $this->input->post('nama_singkat'),
            	'rumus' => $this->input->post('rumus'),
            	'hasil' => $this->input->post('hasil'),
            	'satuan' => $this->input->post('satuan'),
            	'ref_method' => $this->input->post('ref_method')
        	);
        	$this->m_jenis_uji->tambah_data_jenis_uji($tambah_jenis_uji);
		}
    }
    function edit_jenis_uji(){
		$this->form_validation->set_rules('kelompok_jenis_uji', 'Kelompok Jenis Uji', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('nama_singkat', 'Nama Singkat', 'trim|required');
		$this->form_validation->set_rules('rumus', 'Rumus', 'trim|required');
		$this->form_validation->set_rules('hasil', 'Hasil', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('ref_method', 'ref_method', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data  = array('id_jenis_uji' =>$this->input->post('id_jenis_uji'));
        	$edit = array(
            	'id_kelompok_jenis_uji' => $this->input->post('kelompok_jenis_uji'),
            	'nama_lengkap' => $this->input->post('nama_lengkap'),
            	'nama_singkat' => $this->input->post('nama_singkat'),
            	'rumus' => $this->input->post('rumus'),
            	'hasil' => $this->input->post('hasil'),
            	'satuan' => $this->input->post('satuan'),
            	'ref_method' => $this->input->post('ref_method')
        	);
        	$this->m_jenis_uji->edit_data_jenis_uji($data,$edit);
		}
    	
        
    }
    function edit_data_jenis_uji($id){
        $data  = array('id_jenis_uji'=>$id);
        $get = $this->m_jenis_uji->get_data_jenis_uji($data)->row();
        echo json_encode($get);
    }

    function hapus_jenis_uji($id){
        $data  = array('id_jenis_uji'=>$id);
        $this->m_jenis_uji->hapus_data_jenis_uji($data);
    }
}