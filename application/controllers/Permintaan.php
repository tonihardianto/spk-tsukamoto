<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }

        $this->load->model('m_dataproses');
        $this->load->model('m_permintaan');
        
    }

    public function index()
    {
        $data = array(
            'title' => 'Permintaan',
            'permintaan' => $this->m_dataproses->getPermintaan(),
            'permintaan1' => $this->m_dataproses->getPermintaan(),
            'delete' => $this->m_dataproses->getPermintaan(),
            'update' => $this->m_dataproses->getPermintaan(),
            'produksi' => $this->m_dataproses->getPersediaan(),
        );
        $this->load->view('v_permintaan', $data);
        
    }

    function insertPermintaan(){
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        $user_id = $this->session->userdata('ses_id');
        $created_at = date('Y-m-d H:i:s');

        $this->m_dataproses->insertPermintaan($tanggal, $permintaan, $created_at, $user_id);
        redirect('permintaan');
    }

    function inputPermintaan(){
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        // $user_id = $this->session->userdata('ses_id');
        // $created_at = date('Y-m-d H:i:s');

        $data = $this->m_dataproses->insertPermintaan($tanggal, $permintaan);
        echo json_encode($data);
    }

    function updatePermintaan(){
        $id = $this->input->post('id1');
        $tanggal = $this->input->post('tanggal1');
        $permintaan = $this->input->post('permintaan1');

        // print $id."-".$tanggal."-".$permintaan;

        $this->m_permintaan->updatePermintaan($id, $tanggal, $permintaan);
        echo $this->session->set_flashdata('success','Data permintaan berhasil diubah!');
        redirect('permintaan');

    }

    function deletePermintaan(){
        $id  = $this->input->post('id2');
        $this->m_permintaan->hapusPermintaan($id);
        echo $this->session->set_flashdata('success', 'Data permintaan berhasil dihapus!');

        redirect('permintaan');
    }

    

}

/* End of file Permintaan.php */

?>