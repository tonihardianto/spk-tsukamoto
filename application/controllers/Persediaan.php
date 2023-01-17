<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_persediaan');
        $this->load->model('m_dataproses');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Persediaan',
            'persediaan' => $this->m_persediaan->getPersediaan()
        );
        $this->load->view('v_persediaan', $data);
        
    }

    function updatePersediaan(){
        $tanggal = date('Y-m-d');
        $persediaan = $this->input->post('persediaan');
        // $user_id = $this->session->userdata('ses_id');
        // $created_at = date('Y-m-d H:i:s');

        $data = $this->m_persediaan->updatePersediaan($tanggal, $persediaan);
        echo json_encode($data);
    }

}

/* End of file Persediaan.php */
 ?>