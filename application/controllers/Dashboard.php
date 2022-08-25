<?php

class Dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function index(){
        $this->load->view('dashboard/index');
    }
    public function absen($ket)
    {
        $data['keterangan'] = $ket;
        $this->load->view('dashboard/absen', $data);
    }

    private function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public function isi(){
        date_default_timezone_set('Asia/Jakarta');
        // $tgl=date('Y-m-d');
        // $jam=date('H:i:s');
        $keterangan=$this->input->post('keterangan');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $lat=$this->input->post('lat');
        $long=$this->input->post('long');

        $cari=$this->db->get_where('karyawan', array('username'=>$username,'password'=>$password))->result();
        $id_karyawan=$cari[0]->id_karyawan;
        $public_key = $this->gen_uuid();
        $private_key = $this->gen_uuid();
        if(strtolower($keterangan) == 'keluar'){
            redirect('check/checkout/'.$id_karyawan);
        }
        if(strtolower($keterangan) == 'izin'){
            $izin = $this->input->post('izin');
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload('surat');
            $response = $this->upload->data();
            $tgl=date('Y-m-d');
            $jam=date('H:i:s');
            $data=array(
                'id_karyawan'=>$id_karyawan,
                'tgl_absen'=>$tgl,
                'jam_absen'=>$jam,
                'lat' => $lat,
                'long' => $long,
                'status_absen' => strtoupper($keterangan),
                'file' => $response['file_name'],
                'keterangan' => strtoupper($izin)
            );
            $this->db->insert('absen',$data);
            $this->session->set_flashdata('success','Izin '.$keterangan.' berhasil disimpan!');
            redirect('dashboard/index');
        }
        $data=array(
            'id_karyawan' => $id_karyawan,
            'private_key' => $private_key,
            'public_key' => $public_key,
            'status' => 0
        );
        $this->db->insert('token',$data);
        redirect('check/index/'.$id_karyawan);
    }
}