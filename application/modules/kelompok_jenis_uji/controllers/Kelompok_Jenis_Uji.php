<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Kelompok_Jenis_Uji extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_kelompok_jenis_uji');
	}
	public function index() {
		$data['title'] = 'Data Kelompok Jenis Uji';
		$data['content'] = 'kelompok_jenis_uji';
		$data['datatables'] = $this->m_kelompok_jenis_uji->data_kelompok_jenis_uji();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_kelompok_jenis_uji() {
		$this->form_validation->set_rules('nama_kelompok_jenis_uji', 'Nama Kelompok Jenis Uji', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tambah_kelompok_jenis_uji = array(
            	'nama_kelompok_jenis_uji' => $this->input->post('nama_kelompok_jenis_uji'),
        	);
        	$this->m_kelompok_jenis_uji->tambah_data_kelompok_jenis_uji($tambah_kelompok_jenis_uji);
		}
    }
    function edit_kelompok_jenis_uji(){
		$this->form_validation->set_rules('nama_kelompok_jenis_uji', 'Nama Kelompok Jenis Uji', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data  = array('id_kelompok_jenis_uji' =>$this->input->post('id_kelompok_jenis_uji'));
        	$edit = array(
            	'nama_kelompok_jenis_uji' => $this->input->post('nama_kelompok_jenis_uji')
        	);
        	$this->m_kelompok_jenis_uji->edit_data_kelompok_jenis_uji($data,$edit);
		}
    	
        
    }
    function edit_data_kelompok_jenis_uji($id){
        $data  = array('id_kelompok_jenis_uji'=>$id);
        $get = $this->m_kelompok_jenis_uji->get_data_kelompok_jenis_uji($data)->row();
        echo json_encode($get);
    }

    function hapus_kelompok_jenis_uji($id){
        $data  = array('id_kelompok_jenis_uji'=>$id);
        $this->m_kelompok_jenis_uji->hapus_data_kelompok_jenis_uji($data);
    }
}