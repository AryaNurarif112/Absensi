<?php


class Check extends CI_Controller{

    function index($id){
        $data["title"] = 'QR CODE SCAN';
        $data["token"] = $this->db->get_where('token',array('id_karyawan' => $id, 'status' => 0))->result()[0];
        $data["users"] = $this->db->get_where('karyawan', array('id_karyawan' => $id))->result()[0];
        $this->load->view('dashboard/qrcode', $data);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function ischecked($key){
        $check = $this->db->get_where('token', array('public_key' => $key, 'status' => 1))->result();
        header('Content-Type: application/json; charset=utf-8');
        if(count($check) > 0){
            echo json_encode(array(
                "is_check" => true
            ));
        } else {
            echo json_encode(array(
                "is_check" => false
            ));
        }
    }

    function checkin($token){
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('Y-m-d');
        $jam=date('H:i:s');
        $keterangan = 'Masuk';
        $rest = $this->db->get_where('token',array('private_key' => $token, 'status' => 0))->result()[0];
        $this->db->where('private_key', $token);
        $this->db->update('token', array("status" => 1));
        $data=array(
            'id_karyawan'=>$rest->id_karyawan,
            'tgl_absen'=>$tgl,
            'jam_absen'=>$jam,
            'barcode' => $token,
            'status_absen'=>$keterangan
        );
        $this->db->insert('absen',$data);
        $this->session->set_flashdata('success','Absensi '.$keterangan.' berhasil disimpan!');
        redirect('dashboard/index');

    }

    function checkinredirect(){
        $this->session->set_flashdata('success','Absensi Masuk berhasil disimpan!');
        redirect('dashboard/index');
    }

    function checkout($id){
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('Y-m-d');
        $jam=date('H:i:s');
        $keterangan = 'Keluar';
        $data=array(
            'id_karyawan'=>$id,
            'tgl_absen'=>$tgl,
            'jam_absen'=>$jam,
            'status_absen'=>$keterangan
        );
        $this->db->insert('absen',$data);
        $this->session->set_flashdata('success','Absensi '.$keterangan.' berhasil disimpan!');
        redirect('dashboard/index');
    }

    function checkoutredirect(){
        $this->session->set_flashdata('success', 'Absensi Keluar berhasil disimpan!');
        redirect('dashboard/index');
    }

}