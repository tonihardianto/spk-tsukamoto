<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }

        $this->load->model('m_dataproses');
        
    }
    

    public function index()
    {
        $data['dataset'] = $this->m_dataproses->getDataset();
        $data['title'] = 'Decision Maker | Data Sample';
        $this->load->view('v_dataset', $data);
    }

    function insertDataset(){
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        $persediaan = $this->input->post('persediaan');
        $produksi = $this->input->post('produksi');
        $userid = $this->session->userdata('ses_id');

        $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi,$userid);

        redirect('dataset');

    }

    function cronJob(){
        $tanggal = date('Y-m-d');
        $permintaan = mt_rand(0, 100);
        $persediaan = mt_rand(0, 500);
        $produksi = mt_rand(2100, 2500);

        $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);

    }

    

}

/* End of file Dataset.php */


?>