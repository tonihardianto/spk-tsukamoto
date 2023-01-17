<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang extends CI_Model {

    function getCabang(){
        return $this->db->get('tb_cabang');
    }

    function insertCabang($cabang_nama, $cabang_alamat) {
        $res = $this->db->query("INSERT INTO tb_cabang (cabang_nama,cabang_alamat) VALUES('$cabang_nama','$cabang_alamat')");
        return $res;
    }

    function updateCabang($id, $cabang_nama, $cabang_alamat) {
        $res = $this->db->query("UPDATE tb_cabang set cabang_nama='$cabang_nama', cabang_alamat='$cabang_alamat' WHERE cabang_id='$id'");
        return $res;
    }

    function deleteCabang($id){
        $res = $this->db->query("DELETE FROM tb_cabang WHERE cabang_id=$id");
        return $res;
    }

}

/* End of file M_cabang.php */
 ?>