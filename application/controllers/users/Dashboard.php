<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        //Do your magic here
        $this->load->model('m_dataproses');
        $this->load->model('m_user');
        
    }
    
    public function index()
    {
        $chart = $this->m_dataproses->getGraph()->result();
        $line = $this->m_dataproses->getLine()->result();
        $data = array(
            'cline' => json_encode($line),
            'data' => json_encode($chart),
            'user' => $this->m_user->getTotalUser(),
            'sample' => $this->m_dataproses->getTotalDataset(),
            'permintaan' => $this->m_dataproses->getTotalPermintaan(), 
            'persediaan' => $this->m_dataproses->getTotalPersediaan(),
            'produksi' => $this->m_dataproses->getTotalProduksi()
        );
        $this->load->view('user/v_dashboard', $data);
        
    }

}

/* End of file Dashboard.php */


?>