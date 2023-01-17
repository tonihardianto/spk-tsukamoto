<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        $this->load->model('m_dataproses');
        $this->load->model('m_cabang');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Cabang',
            'data' => $this->m_cabang->getCabang(),
            'update' => $this->m_cabang->getCabang(),
            'delete' => $this->m_cabang->getCabang()
        );
        $this->load->view('v_cabang', $data);
    }

    function insertcabang(){
        $cabang_nama = $this->input->post('nama');
        $cabang_alamat = $this->input->post('alamat');

        $this->m_cabang->insertCabang($cabang_nama,$cabang_alamat);
        redirect('cabang');
    }

    function updateCabang(){
        $id = $this->input->post('id');
        $cabang_nama = $this->input->post('nama');
        $cabang_alamat = $this->input->post('alamat');

        $this->m_cabang->updateCabang($id,$cabang_nama,$cabang_alamat);
        redirect('cabang');
    }

    function deleteCabang(){
        $id = $this->input->post('id');

        $this->m_cabang->deleteCabang($id);
        redirect('cabang');
    }
}

/* End of file Controllername.php */
?>