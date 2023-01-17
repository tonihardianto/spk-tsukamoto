<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        //Do your magic here
        $this->load->model('m_dataproses');
        $this->load->model('m_user');
        $this->load->model('m_cabang');
        
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Decision Maker | User Account',
            'user'  => $this->m_user->getUser(),
            'update'  => $this->m_user->getUser(),
            'delete' => $this->m_user->getUser(),
            'up'    => $this->m_user->getUser(),
            'del'   => $this->m_user->getUser(),
            'cabang' => $this->m_cabang->getCabang()->result_array()
        );
        $this->load->view('v_user', $data);
    }

    function insertUser(){
        $user_fullname = $this->input->post('user_fullname');
        $user_username = $this->input->post('user_username');
        $user_password = md5($this->input->post('user_password'));
        $user_level = $this->input->post('user_level');
        $created_at = date("Y-m-d H:m:d");

        $this->m_user->insertUser($user_username, $user_password, $user_fullname, $user_level, $created_at);
        $this->session->set_flashdata('success', 'User added successfully');
        redirect('user');
    }

    function updateUser(){
        $user_id = $this->input->post('user_id');
        $user_fullname = $this->input->post('user_fullname');
        $user_username = $this->input->post('user_username');
        $user_password = $this->input->post('user_password');
        $user_level = $this->input->post('user_level');
        $updated_at = date("Y-m-d H:m:d");

        if (empty($user_password)) {
            $this->m_user->updateUser_nopass($user_id, $user_username, $user_fullname, $user_level, $updated_at);
            $this->session->set_flashdata('success', 'User updated successfully');
            redirect('user');
        }else{
            $this->m_user->updateUser($user_id, $user_username, $user_password, $user_fullname, $user_level, $updated_at);
            $this->session->set_flashdata('success', 'User updated successfully');
            redirect('user');
        }

    }

    function deleteUser(){
        $user_id = $this->input->post('user_id');
        $this->m_user->deleteUser($user_id);
        $this->session->set_flashdata('success', 'User deleted successfully');
        redirect('user');
    }

}

/* End of file User.php */


?>