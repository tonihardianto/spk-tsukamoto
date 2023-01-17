<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_dataproses');
        $this->load->model('m_report');
        
        
    }
    

    public function index()
    {
        $this->load->view('v_report');
    }

    function print(){
        $awal = $this->input->post("tanggal1");
        $akhir = $this->input->post("tanggal2");
        
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['total'] = $this->m_report->getTotal($awal, $akhir);
        $data['data'] = $this->m_report->getReport($awal, $akhir);

        $this->load->view('v_report',$data);
    }

    function printO(){
        $awal = $this->input->post("tanggal1");
        $akhir = $this->input->post("tanggal2");
        $user = $this->input->post("user");
        
        $data['user'] = $user;
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['total'] = $this->m_report->getTotalO($user, $awal, $akhir);
        $data['data'] = $this->m_report->getReportO($user, $awal, $akhir);

        $this->load->view('v_report',$data);
    }

}

/* End of file Report.php */


?>