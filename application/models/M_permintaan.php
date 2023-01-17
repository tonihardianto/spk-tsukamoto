<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan extends CI_Model {

    function getTotalPermintaan() {
        $user_id = $this->session->userdata('ses_id');
        $res = $this->db->query("SELECT SUM(permintaan) AS permintaan FROM tb_permintaan WHERE user_id=$user_id AND tanggal = SUBDATE(CURDATE(), -1) ");
        $total = $res->result_array();
        return $total;
    }

    function deletePermintaan($tanggal) {
        $user_id = $this->session->userdata('ses_id');
        return $this->db->query("DELETE FROM tb_permintaan WHERE user_id=$user_id AND tanggal = '$tanggal'");
    }

    function updatePermintaan($id, $tanggal, $permintaan) {
        return $this->db->query("UPDATE tb_permintaan SET tanggal='$tanggal', permintaan='$permintaan' WHERE id='$id'");
    }

    function hapusPermintaan($id){
        return  $this->db->query("DELETE FROM tb_permintaan WHERE id='$id'");
    }
    

}

/* End of file ModelName.php */


?>