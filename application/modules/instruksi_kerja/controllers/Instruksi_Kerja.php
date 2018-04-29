<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Instruksi_Kerja extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_instruksi_kerja');
		$this->load->helper('url');
	}
	public function index() {
		$data['title'] = 'Data Instruksi Kerja';
		$data['content'] = 'instruksi_kerja';
		$data['datatables'] = $this->m_instruksi_kerja->data_instruksi_kerja();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_instruksi_kerja() {
		$config['upload_path']="./assets/file";
        $config['allowed_types']='gif|jpg|png|pdf|doc|docx';
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = $this->upload->data();

            $config['source_image']='./assets/file/'.$data['file_name'];
            $config['new_image']= './assets/file/'.$data['file_name'];

	        $image= $data['file_name'];

	        $tambah_instruksi_kerja = array(
            	'nama_instruksi_kerja' => $this->input->post('nama_instruksi_kerja'),
            	'file_instruksi_kerja' => $image,
        	);
        	$this->m_instruksi_kerja->tambah_data_instruksi_kerja($tambah_instruksi_kerja);
        }
    }
    function edit_instruksi_kerja(){
		$config['upload_path']="./assets/file";
        $config['allowed_types']='gif|jpg|png|pdf|doc|docx';
        if (empty($_FILES['file']['name'])) {
        	$data  = array('id_instruksi_kerja' =>$this->input->post('id_instruksi_kerja'));
        	$edit = array(
            	'nama_instruksi_kerja' => $this->input->post('nama_instruksi_kerja'),
            	'file_instruksi_kerja' => $this->input->post('nama_file_referensi')
        	);
        	$this->m_instruksi_kerja->edit_data_instruksi_kerja($data,$edit);
        } else {
        	$this->load->library('upload',$config);
	    	if($this->upload->do_upload("file")){
	        	$data = $this->upload->data();
            	$config['source_image']='./assets/file/'.$data['file_name'];
            	$config['new_image']= './assets/file/'.$data['file_name'];

	        	$image= $data['file_name'];

	        	$data  = array('id_instruksi_kerja' =>$this->input->post('id_instruksi_kerja'));
        		$edit = array(
            		'nama_instruksi_kerja' => $this->input->post('nama_instruksi_kerja'),
            		'file_instruksi_kerja' => $image
        		);
        		$this->m_instruksi_kerja->edit_data_instruksi_kerja($data,$edit);
        	}
        }
        	
    }
    function edit_data_instruksi_kerja($id){
        $data  = array('id_instruksi_kerja'=>$id);
        $get = $this->m_instruksi_kerja->get_data_instruksi_kerja($data)->row();
        echo json_encode($get);
    }

    function hapus_instruksi_kerja($id){
        $data  = array('id_instruksi_kerja'=>$id);
        $this->m_instruksi_kerja->hapus_data_instruksi_kerja($data);
    }
}