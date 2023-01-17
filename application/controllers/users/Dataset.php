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
        $this->load->view('user/v_dataset', $data);
    }

    function insertDataset(){
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        $persediaan = $this->input->post('persediaan');
        $produksi = $this->input->post('produksi');

        $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);

        redirect('users/dataset');

    }

}

/* End of file Dataset.php */


?>