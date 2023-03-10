<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
        $this->load->model('m_user');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login', $data);
    }

    function auth(){
        $username=htmlspecialchars($this->input->post('username',true),ENT_QUOTES);
        $password=htmlspecialchars(md5($this->input->post('password',true)),ENT_QUOTES);

        $cek_akses=$this->m_user->getAuth($username,$password);

        if ($cek_akses->num_rows() > 0) {
            $data = $cek_akses->row_array();

            if($data['user_level']=='admin'){
                $this->session->set_userdata('loggedin',TRUE);
                $this->session->set_userdata('ses_id', $data['user_id']);
                $this->session->set_userdata('c_id', $data['cabang_id']);
                $this->session->set_userdata('ses_name', $data['user_fullname']);
                $this->session->set_userdata('ses_level', $data['user_level']);

                redirect('home');

            }elseif($data['user_level']=='user'){
                $this->session->set_userdata('loggedin',TRUE);
                $this->session->set_userdata('ses_id', $data['user_id']);
                $this->session->set_userdata('c_id', $data['cabang_id']);
                $this->session->set_userdata('ses_name', $data['user_fullname']);
                $this->session->set_userdata('ses_level', $data['user_level']);

                redirect('dashboard');
            }

        }else{
            echo $this->session->set_flashdata('fail','Username atau password salah!');
            redirect('login');
         }
        //  echo json_encode($response);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }

}

/* End of file Login.php */


?>