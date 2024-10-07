<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard Resepsionis';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jumlahsuratbaru'] = $this->SuratMasuk_model->jumlahsuratbaru();
        $data['totalsuratmasuk'] = $this->SuratMasuk_model->totalsuratmasuk();
        $data['jumlaharsipsurat'] = $this->SuratMasuk_model->jumlaharsipsurat();
        $data['suratdalamdisposisi'] = $this->SuratMasuk_model->suratmasukdalamdisposisi();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function dashboard()
    {
        $data['title'] = 'Dashboard Pimpinan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jumlahsuratbaru'] = $this->Disposisi_model->smPengguna2();
        $data['jumlaharsipsurat'] = $this->SuratMasuk_model->getArsipSuratmasukPengguna2();
        $data['suratdalamdisposisi'] = $this->SuratMasuk_model->suratmasukdalamdisposisiPengguna();
        $data['totalsuratmasukpengguna'] = $this->SuratMasuk_model->totalsuratmasukPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboardpimpinan', $data);
        $this->load->view('templates/footer');
    }

    public function daftaruser()
    {
        $data['title'] = 'Daftar User';
        $data['daftaruser'] = $this->User_model->getAllUser();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/daftaruser', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_user)
    {
        $this->User_model->hapusUser($id_user);

        redirect('admin/daftaruser');
    }
}
