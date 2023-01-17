<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_persediaan extends CI_Model {

    function getPersediaan() {
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT * FROM tb_dataset where user_id=$user_id order by tanggal DESC");
        return $res->result_array();
    }

    function updatePersediaan($tanggal, $persediaan) {
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("UPDATE tb_dataset SET persediaan='$persediaan' WHERE tanggal='$tanggal' AND user_id='$user_id'");
        return $res;
    }

}

/* End of file M_persediaan.php */
 ?>