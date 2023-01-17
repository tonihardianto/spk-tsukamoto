<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {

    function getReport($awal, $akhir){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT date_format(tanggal, '%d %M %Y') as tanggal,permintaan,persediaan,produksi FROM tb_prediksi WHERE user_id=$user_id AND tanggal BETWEEN '$awal' AND '$akhir' ");
        return $res;
    }

    function getTotal($awal, $akhir){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT sum(permintaan) as permintaan, sum(persediaan) as persediaan, sum(produksi) as produksi FROM tb_prediksi WHERE user_id=$user_id AND tanggal BETWEEN '$awal' AND '$akhir' ");
        return $res;
    }

    function getReportO($user,$awal, $akhir){
        // $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT user_fullname, date_format(tanggal, '%d %M %Y') as tanggal,permintaan,persediaan,produksi FROM tb_prediksi JOIN tb_user ON tb_prediksi.user_id=tb_user.user_id WHERE tb_user.user_fullname='$user' AND tanggal BETWEEN '$awal' AND '$akhir' ");
        return $res;
    }

    function getTotalO($user,$awal, $akhir){
        // $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT user_fullname, sum(permintaan) as permintaan, sum(persediaan) as persediaan, sum(produksi) as produksi FROM tb_prediksi JOIN tb_user ON tb_prediksi.user_id=tb_user.user_id WHERE tb_user.user_fullname='$user' AND tanggal BETWEEN '$awal' AND '$akhir' ");
        return $res;
    }

}

/* End of file M_report.php */


?>