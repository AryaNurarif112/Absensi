<?php 

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        if($this->session->userdata('status')== "login"){
            $data['admin']=$this->db->get('admin')->result();
            $this->load->view('admin/admin/index', $data);
        }
        else{
            redirect('admin/login');
        }
    }
    public function add()
    {
        $this->load->view('admin/admin/add');
    }
    public function save(){
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $data=array(
            'nama_admin'=>$nama,
            'username'=>$username,
            'password'=>md5($password)
        );
        $this->db->insert('admin', $data);
        $this->session->set_flashdata('success','Berhasil disimpan!');
        redirect('admin/admin');
    }
    public function change($id){
        $data['cari']=$this->db->get_where('admin', array('id_admin'=>$id))->result();
        $this->load->view('admin/admin/change', $data);
    }
    public function schange(){
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id=$this->input->post('kode');

        if ($password == ""){
            $data=array(
                'nama_admin'=>$nama,
                'username'=>$username
            );
        }else{
            $data=array(
                'nama_admin'=>$nama,
                'username'=>$username,
                'password'=>md5($password)
            );
        }
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
        $this->session->set_flashdata('success','Berhasil diubah!');
        redirect('admin/admin');
    }
    public function delete($id){
        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
        $this->session->set_flashdata('success', 'Berhasil dihapus!');
        redirect('admin/admin');
    }
}