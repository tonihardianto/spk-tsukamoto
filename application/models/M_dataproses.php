<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataproses extends CI_Model {

    function getDataset() {
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT * FROM tb_dataset where user_id=$user_id order by tanggal desc");
    }

    function insertDataset($tanggal,$permintaan,$persediaan,$produksi, $userid){
        return $this->db->query("INSERT into tb_dataset (tanggal,permintaan,persediaan,produksi,user_id) values('$tanggal','$permintaan','$persediaan','$produksi','$userid') ");
    }
//
    function getMaxPermintaan(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT max(permintaan) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }
    function getMinPermintaan(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT min(permintaan) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }

    function getMaxPersediaan(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT max(persediaan) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }

    function getMinPersediaan(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT min(persediaan) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }

    function getMaxProduksi(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT max(produksi) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }

    // where id>='1' and id<='30'
    function getMinProduksi(){ //ambil data selama 30 hari terahir
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT min(produksi) as a from tb_dataset WHERE id>=(SELECT MIN(id) FROM tb_dataset) AND id<=(SELECT MAX(id) FROM tb_dataset) AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
    }

    function insertPrediksi($tanggal,$permintaan,$persediaan,$produksi,$adonan,$user_id,$created_at){
        $res = $this->db->query("insert into tb_prediksi (tanggal,permintaan,persediaan,produksi,adonan,user_id,created_at) values('$tanggal','$permintaan','$persediaan','$produksi','$adonan','$user_id','$created_at')");
        return $res;
    }

    function getHasilPrediksi(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal FROM tb_prediksi where user_id =$user_id");
        return $res;
    }

    function getGraph(){
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT DISTINCT *, DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal FROM tb_prediksi WHERE user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
        
    }

    function getLine(){
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT * from tb_prediksi where user_id = $user_id");
    }

    // graph untuk head office
    function getGraphHead($user_id, $tgl1, $tgl2){
        return $this->db->query("SELECT DISTINCT *, DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal FROM tb_prediksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' AND user_id=$user_id ORDER BY tanggal DESC LIMIT 30");
        
    }

    function getLineHead($user_id, $tgl1, $tgl2){
        return $this->db->query("SELECT * from tb_prediksi where tanggal BETWEEN '$tgl1' AND '$tgl2' AND user_id = $user_id");
    }

    function getTotalDataset(){
        $res = $this->db->get('tb_dataset');
        $total = $res->num_rows();
        return $total; 
    }

    function getTotalPermintaan(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("select sum(permintaan) as total from tb_prediksi where user_id = $user_id");
        $total = $res->result_array();
        return  $total;
    }

    function getTotalPersediaan(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT SUM(persediaan) AS total FROM tb_dataset WHERE user_id=$user_id AND tanggal=SUBDATE(CURDATE(), 1)");
        $total = $res->result_array();
        return $total;
    }

    function getTotalProduksi(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT SUM(produksi) AS total FROM tb_prediksi WHERE user_id=$user_id AND tanggal = CURDATE()");
        $total = $res->result_array();
        return $total;
    }

    function getPermintaan(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT * from tb_permintaan where user_id = $user_id order by tanggal ASC");
        // $total = $res->result_array();
        return $res;
    }

    function getPermintaanToday(){
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT *, SUM(permintaan) AS permintaan FROM tb_permintaan WHERE user_id=$user_id AND tanggal = CURDATE()");
    }

    function getTotalPermintaanUser(){
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal from tb_permintaan where user_id=$user_id order by tanggal ASC");;
    }

    function getPersediaan(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT * from tb_dataset WHERE user_id=$user_id AND tanggal = SUBDATE(CURDATE(), 1)");
        // $total = $res->result_array();
        return $res;
    }
    

    function insertPermintaan($tanggal, $permintaan){
        $user_id = $this->session->userdata('ses_id');
        $created_at = date('Y-m-d H:i:s');
        $res = $this->db->query("INSERT INTO tb_permintaan (tanggal, permintaan, created_at, user_id) VALUES ('$tanggal', '$permintaan', '$created_at', '$user_id')");
        return $res;
    }

    function deletePermintaan($id){
        return $this->db->query("DELETE FROM tb_permintaan WHERE id = '$id'");
    }

    function getFilter($tgl1,$tgl2){
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("SELECT * FROM tb_prediksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' AND user_id='$user_id' ");
    }

    // filter Headoffice
    function getFilterO($user_id,$tgl1,$tgl2){
        return $this->db->query("SELECT * FROM tb_prediksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' AND user_id='$user_id' ");
    }

    function getMonitoring(){
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT * FROM tb_prediksi where user_id='$user_id'");
        return $res;
    }


}

/* End of file M_DataProses.php */


?>