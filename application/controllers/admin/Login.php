<?php 

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('admin/login/index');
    }
    public function proses(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->db->get_where('admin', array('username' => $username, 'password' => md5($password)
    ));
        $banyak = $cek->num_rows();
        $data = $cek->result();
        if ($banyak >= 1) {
            $data_session = array(
                'id_admin' => $data[0]->id_admin,
                'username' => $username,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('admin/dashboard');
        }else{
            $this->session->set_flashdata('error','Username atau Password anda salah!');
            redirect('admin/login');
        }
    }
    public function logout() 
    {
        session_destroy();
        redirect('admin/dashboard');
    }
}