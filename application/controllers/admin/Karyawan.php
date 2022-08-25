<?php 

class Karyawan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        if($this->session->userdata('status')== "login"){
            $data['karyawan']=$this->db->get('karyawan')->result();
            $this->load->view('admin/karyawan/index', $data);
        }
        else{
            redirect('admin/login');
        }
    }
    public function add()
    {
        $this->load->view('admin/karyawan/add');
    }
    public function save(){
        $nama=$this->input->post('nama');
        $status=$this->input->post('status');
        $kelamin=$this->input->post('kelamin');
        $telp=$this->input->post('telp');
        $alamat=$this->input->post('alamat');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $data=array(
            'nama'=>$nama,
            'status'=>$status,
            'jk'=>$kelamin,
            'telp'=>$telp,
            'alamat'=>$alamat,
            'username'=>$username,
            'password'=>$password
        );
        $this->db->insert('karyawan', $data);
        $this->session->set_flashdata('success','Berhasil disimpan!');
        redirect('admin/karyawan');
    }
    public function change($id){
        $data['cari']=$this->db->get_where('karyawan', array('id_karyawan'=>$id))->result();
        $this->load->view('admin/karyawan/change', $data);
    }
    public function schange(){
        $nama=$this->input->post('nama');
        $status=$this->input->post('status');
        $kelamin=$this->input->post('kelamin');
        $telp=$this->input->post('telp');
        $alamat=$this->input->post('alamat');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id=$this->input->post('kode');

        $data=array(
            'nama'=>$nama,
            'status'=>$status,
            'jk'=>$kelamin,
            'telp'=>$telp,
            'alamat'=>$alamat,
            'username'=>$username,
            'password'=>$password,
        );
        $this->db->where('id_karyawan', $id);
        $this->db->update('karyawan', $data);
        $this->session->set_flashdata('success','Berhasil diubah!');
        redirect('admin/karyawan');
    }
    public function delete($id){
        $this->db->where('id_karyawan', $id);
        $this->db->delete('karyawan');
        $this->session->set_flashdata('success', 'Berhasil dihapus!');
        redirect('admin/karyawan');
    }
}