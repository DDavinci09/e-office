<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Arsip Surat';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        
        // Load Pagination
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/e-office/arsip/index';

        // Config Pagination
        $config['total_rows'] = $this->SuratMasuk_model->gettotalArsip();
        $config['per_page'] = 7;
        $data['total_rows'] = $config['total_rows'];
        
        // Initialize
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['arsip'] = $this->SuratMasuk_model->getArsip($config['per_page'], $data['start'], $data['total_rows']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('arsip/index', $data);
        $this->load->view('templates/footer');
    }

    public function arsipPengguna()
    {
        $data['title'] = 'Arsip Surat';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['arsip'] = $this->SuratMasuk_model->getArsipSuratmasukPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('arsip/arsippengguna', $data);
        $this->load->view('templates/footer');
    }

    public function arsipSurat($id_suratmasuk)
    {
        $data['title'] = 'Arsipkan Surat?';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $jabatan = $this->User_model->GetJabatanUser();
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);

        $this->SuratMasuk_model->arsipsurat($id_suratmasuk, $jabatan);
        redirect('disposisi/suratmasukpengguna');
    }
}
