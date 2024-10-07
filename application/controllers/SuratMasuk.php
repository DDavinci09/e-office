<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('contact_model', 'contact');
    // }

    public function index()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasuk();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['status'] = ['Asli', 'Tebusan'];
        $data['sifat'] = ['Sangat Rahasia', 'Rahasia', 'Biasa'];
        $data['prioritas'] = ['Sangat Segera/Kilat', 'Segera', 'Biasa'];
        $data['jabatan'] = $this->Unit_model->getAlljabatan3();

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
        $this->form_validation->set_rules('tgl_terima', 'Tanggal Diterima', 'required');
        $this->form_validation->set_rules('no_agenda', 'Nomor Agenda', 'required');
        $this->form_validation->set_rules('dari', 'Dari', 'required');
        $this->form_validation->set_rules('kepada', 'Kepada', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/file/suratmasuk';
            $config['allowed_types']  = 'pdf|jpg|png';
            $config['max_size']       = '20000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $this->SuratMasuk_model->tambahSuratMasuk($this->upload->data());

                redirect('SuratMasuk');
            } else {
                redirect('SuratMasuk/tambah');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id_suratmasuk)
    {
        $data['title'] = 'Edit Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $data['status'] = ['Asli', 'Tebusan'];
        $data['sifat'] = ['Sangat Rahasia', 'Rahasia', 'Biasa'];
        $data['prioritas'] = ['Sangat Segera/Kilat', 'Segera', 'Biasa'];
        $data['jabatan'] = $this->Unit_model->getAlljabatan3();

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
        $this->form_validation->set_rules('tgl_terima', 'Tanggal Diterima', 'required');
        $this->form_validation->set_rules('no_agenda', 'Nomor Agenda', 'required');
        $this->form_validation->set_rules('dari', 'Dari', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/file/suratmasuk';
            $config['allowed_types']  = 'pdf|jpg|png';
            $config['max_size']       = '20000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/file/suratmasuk/' . $data['suratmasuk']['file'];

                if (is_readable($file) && unlink($file)) {
                    $this->SuratMasuk_model->editSuratMasukFile($this->upload->data());
                    redirect('SuratMasuk');
                }
            } else {
                $this->SuratMasuk_model->editSuratMasuk();
                redirect('SuratMasuk');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function detail($id_suratmasuk)
    {
        $data['title'] = 'Detail Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_suratmasuk)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $file = './assets/file/suratmasuk/' . $data['suratmasuk']['file'];

        if (is_readable($file) && unlink($file)) {
            $this->SuratMasuk_model->hapusSuratMasuk($id_suratmasuk);
            redirect('SuratMasuk');
        } else {
            echo "gagal";
        }
    }

    public function arsip($id_suratmasuk)
    {
        $this->SuratMasuk_model->arsipsurat();
        redirect('disposisi/suratmasukpengguna');
    }

    public function daftarsurat()
    {
        $data['title'] = 'Daftar Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        // Load Pagination
        $this->load->library('pagination');

        // Ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        $config['base_url'] = 'http://localhost/e-office/suratmasuk/daftarsurat';
        // Config Pagination
        // $config['total_rows'] = $this->SuratMasuk_model->totalsuratmasuk();
        $this->db->like('dari', $data['keyword']);
        $this->db->or_like('no_surat', $data['keyword']);
        $this->db->or_like('perihal', $data['keyword']);
        $this->db->from('tb_surat_masuk');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 6;
        $data['total_rows'] = $config['total_rows'];

        // Initialize
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukLaporan2($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/daftarsurat', $data);
        $this->load->view('templates/footer');
    }

    






    // Not Used
    public function suratpertanggal()
    {
        $data['title'] = 'Daftar Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['suratmasuk'] = $this->SuratMasuk_model->getsuratpertanggal($mulai_tanggal, $sampai_tanggal);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/daftarsurat', $data);
        $this->load->view('templates/footer');
    }

    public function pencariansurat()
    {
        $data['title'] = 'Daftar Surat Masuk';
        $keyword = $this->input->post('keyword');
        $data['suratmasuk'] = $this->SuratMasuk_model->carisurat($keyword);
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/hasilpencarian', $data);
        $this->load->view('templates/footer');
    }

    public function pencariantanggal()
    {
        $data['title'] = 'Daftar Surat Masuk';
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['suratmasuk'] = $this->SuratMasuk_model->tanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['totalsurat'] = $this->SuratMasuk_model->totaltanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/hasilpencarian', $data);
        $this->load->view('templates/footer');
    }
}
