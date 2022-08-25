<?php

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        if ($this->session->userdata('status') == "login") {
            $date1 = $this->input->get('date1');
            $date2 = $this->input->get('date2');
            
            if(isset($date1) && !empty($date1)){
                $date1 = $date1;
            } else {
                $date1 = date('Y-m');
            }

            if(isset($date2) && !empty($date2)){
                $date2 = $date2;
            } else {
                $date2 = date('Y-m');
            }

            $first_day = date('Y-m-d', strtotime($date1));
            $last_day = date('Y-m-d', strtotime($date2));
            // $last_day = date('Y-m-t', strtotime($date));
            // $response = $this->db->query("SELECT count(b.id_absen) as jumlah, a.nama, b.status_absen from karyawan as a 
            // left join absen as b on a.id_karyawan = b.id_karyawan where b.tgl_absen BETWEEN 
            // '$first_day' and '$last_day' group by a.nama, b.status_absen;")->result();
            $response = $this->db->query("SELECT count(b.id_absen) as jumlah, a.nama, a.status, b.status_absen from karyawan as a 
            left join absen as b on a.id_karyawan = b.id_karyawan where b.tgl_absen BETWEEN '$first_day' AND '$last_day' group by a.nama, a.status, b.status_absen;")->result();
            $result = array();
            foreach($response as $res){
                if(isset($result[strtolower($res->nama) && strtoupper($res->status)])){
                    $result[strtolower($res->nama)][strtoupper($res->status_absen)] = $res->jumlah;
                } else {
                    $result[strtolower($res->nama)] = [ 'MASUK' => 0, 'IZIN' => 0, 'KELUAR' => 0, 'STATUS' => strtoupper($res->status) ];
                    $result[strtolower($res->nama)][strtoupper($res->status_absen)] = $res->jumlah;
                }
            }
            $data['absen'] = $result;
            $this->load->view('admin/report/index', $data);
            
        } else {
            redirect('admin/login');
        }
    }
}
