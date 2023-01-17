<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true and $this->session->userdata('ses_level') != 'admin') {
            $url = base_url().'login';
            redirect($url);
        }
        $this->load->model('m_dataproses');
        $this->load->model('m_cabang');
        $this->load->model('m_user');
        
    }

    public function index()
    {
        $data = array(
            'data' => $this->m_dataproses->getMonitoring()->result_array(),
            'title' => 'Monitoring Cabang',
            'cabang' => $this->m_user->getUser()->result_array(),
            'cabang2' => $this->m_user->getUser()->result_array()
        );
        $this->load->view('v_monitoring', $data);
    }

    function show() {
        $user_id = $this->input->get('userid');
        $tgl1 = $this->input->get('dari');
        $tgl2 = $this->input->get('sampai');

        $data['data'] = $this->m_dataproses->getFilterO($user_id,$tgl1,$tgl2)->result_array();
        $this->load->view('v_monitoring', $data);
    }
    

}

/* End of file Monitor.php */


?>

