<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    function getUser(){
        return $this->db->query("SELECT * from tb_user");
    }

    function getTotalUser(){
        $res = $this->db->get('tb_user');
        $total = $res->num_rows();
        return $total;
    }

    function getAuth($username, $password){
        return $this->db->query("select * from tb_user where user_username='$username' and user_password='$password' LIMIT 1");
    }

    function insertUser($user_username, $user_password, $user_fullname, $user_level, $created_at){
        return $this->db->query("INSERT INTO tb_user (user_username, user_password, user_fullname, user_level, created_at) VALUES('$user_username', '$user_password', '$user_fullname','$user_level','$created_at')");
    }

    function updateUser($user_id,$user_username, $user_password, $user_fullname, $user_level, $updated_at){
        return $this->db->query("UPDATE tb_user SET user_username='$user_username', user_password=md5('$user_password'), user_fullname='$user_fullname', user_level='$user_level', updated_at='$updated_at' WHERE user_id='$user_id'");
    }

    function updateUser_nopass($user_id,$user_username, $user_fullname, $user_level, $updated_at){
        return $this->db->query("UPDATE tb_user SET user_username='$user_username', user_fullname='$user_fullname', user_level='$user_level', updated_at='$updated_at' WHERE user_id='$user_id'");
    }

    function deleteUser($user_id){
        return $this->db->query("DELETE FROM tb_user WHERE user_id='$user_id'");
    }


}

/* End of file M_user.php */

?>