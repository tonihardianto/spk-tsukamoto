<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        $this->load->model('m_dataproses');
        $this->load->model('m_user');
        $this->load->model('m_permintaan');
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
            'permintaan' => $this->m_permintaan->getTotalPermintaan(), 
            'persediaan' => $this->m_dataproses->getTotalPersediaan(),
            'produksi' => $this->m_dataproses->getTotalProduksi(),
            'cabang' => $this->m_user->getUser()->result_array(),
        );

        $this->load->view('v_home', $data);
    }

    function show(){
        $user_id = $this->input->get('userid');
        $tgl1 = $this->input->get('dari');
        $tgl2 = $this->input->get('sampai');
        $chart = $this->m_dataproses->getGraphHead($user_id, $tgl1, $tgl2)->result();
        $line = $this->m_dataproses->getLineHead($user_id, $tgl1, $tgl2)->result();
        $data = array(
            'cline' => json_encode($line),
            'data' => json_encode($chart),
            'user' => $this->m_user->getTotalUser(),
            'sample' => $this->m_dataproses->getTotalDataset(),
            'permintaan' => $this->m_permintaan->getTotalPermintaan(), 
            'persediaan' => $this->m_dataproses->getTotalPersediaan(),
            'produksi' => $this->m_dataproses->getTotalProduksi(),
            'cabang' => $this->m_user->getUser()->result_array(),
        );
        $this->load->view('v_home', $data);
    }

}

/* End of file Home.php */
 ?>