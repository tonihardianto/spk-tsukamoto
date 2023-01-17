<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Decision extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        //Do your magic here
        $this->load->model('m_dataproses');
        
    }
    

    public function index()
    {
        $data['data'] = $this->m_dataproses->getHasilPrediksi();
        $this->load->view('user/v_decision',$data); 
    }

    function insertPrediksi(){
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        $persediaan = $this->input->post('persediaan');
        $produksi = $this->input->post('produksi');

        $this->m_dataproses->insertPrediksi($id, $tanggal, $permintaan, $persediaan, $produksi);
    }

}

/* End of file Decision.php */


?>