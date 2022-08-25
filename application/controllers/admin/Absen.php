<?php

class Absen extends CI_Controller
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
            $this->db->join('karyawan', 'karyawan.id_karyawan=absen.id_karyawan');
            $data['absen'] = $this->db->get('absen')->result();
            $this->load->view('admin/dashboard/index', $data);
        } else {
            redirect('admin/login');
        }
    }


    public function map()
    {
        $this->load->view('admin/map');
    }
}
