<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class Gudang extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_gudang');
		$this->load->helper('url');
	}
	public function index() {
		$data['title'] = 'Data Instruksi Kerja';
		$data['content'] = 'instruksi_kerja';
		$data['datatables'] = $this->m_gudang->data_gudang();
		$this->load->view('dashboard/dashboard',$data);
	}
	function tambah_gudang() {
		$config['upload_path']="./assets/bahan_kimia";
        $config['allowed_types']='gif|jpg|png|pdf|doc|docx';
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = $this->upload->data();

            $config['source_image']='./assets/bahan_kimia/'.$data['file_name'];
            $config['new_image']= './assets/bahan_kimia/'.$data['file_name'];

	        $image= $data['file_name'];

	        $tambah_gudang = array(
            	'nama_bahan' => $this->input->post('nama_bahan'),
            	'nama_kimia' => $this->input->post('nama_kima'),
                'katalog' => $this->input->post('katalog'),
                'jumlah' => $this->input->post('jumlah'),
                'file_bahan_kimia' => $image,
        	);
        	$this->m_gudang->tambah_data_gudang($tambah_gudang);
        }
    }
    function edit_instruksi_kerja(){
		$config['upload_path']="./assets/bahan_kimia";
        $config['allowed_types']='gif|jpg|png|pdf|doc|docx';
        if (empty($_FILES['file']['name'])) {
        	$data  = array('id_gudang' =>$this->input->post('id_gudang'));
        	$edit = array(
            	'nama_bahan' => $this->input->post('nama_bahan'),
                'nama_kimia' => $this->input->post('nama_kima'),
                'katalog' => $this->input->post('katalog'),
                'jumlah' => $this->input->post('jumlah'),
                'file_bahan_kimia' => $this->input->post('file_bahan_kimia'),
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
            		'nama_bahan' => $this->input->post('nama_bahan'),
                    'nama_kimia' => $this->input->post('nama_kima'),
                    'katalog' => $this->input->post('katalog'),
                    'jumlah' => $this->input->post('jumlah'),
                    'file_bahan_kimia' => $image,
        		);
        		$this->m_instruksi_kerja->edit_data_instruksi_kerja($data,$edit);
        	}
        }
        	
    }
    function edit_data_gudang($id){
        $data  = array('id_gudang'=>$id);
        $get = $this->m_gudang->get_data_gudang($data)->row();
        echo json_encode($get);
    }

    function hapus_instruksi_kerja($id){
        $data  = array('id_gudang'=>$id);
        $this->m_gudang->hapus_data_gudang($data);
    }
}