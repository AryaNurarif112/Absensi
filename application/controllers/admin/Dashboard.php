<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        if ($this->session->userdata('status') == "login") {
            $this->db->select('*');
            $this->db->join('karyawan','karyawan.id_karyawan=absen.id_karyawan');                     
            $data['absen'] = $this->db->get('absen')->result();
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('admin/login');
        }
    }
}
