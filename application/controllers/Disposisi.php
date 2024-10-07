<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Disposisi';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['disposisi'] = $this->Disposisi_model->disposisiSurat();
        

        // Load Pagination
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/e-office/disposisi/index';

        // Config Pagination
        $config['total_rows'] = $this->SuratMasuk_model->getAllSuratMasukDisposisi1();
        $config['per_page'] = 7;
        $data['total_rows'] = $config['total_rows'];

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukDisposisi($config['per_page'], $data['start'], $data['total_rows']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('disposisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function disposisipengguna()
    {
        $data['title'] = 'Daftar Disposisi';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['suratmasuk'] = $this->SuratMasuk_model->getDispoisiSuratmasukPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('disposisi/disposisipengguna', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdisposisi($id_suratmasuk, $id_disposisi)
    {
        $data['title'] = 'Disposisi Surat';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $data['unit'] = $this->Disposisi_model->getUnit1();
        $data['disposisi'] = $this->Disposisi_model->getDisposisiById($id_disposisi);
        
        $this->form_validation->set_rules('jabatan', 'Penerima', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Disposisi_model->tambahDisposisi();
            $this->Disposisi_model->editStatusDisposisi();
            $this->SuratMasuk_model->petunjuk($id_suratmasuk);

            redirect('disposisi/suratmasukpengguna');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('disposisi/tambahdisposisi', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function tambahdisposisi1($id_suratmasuk)
    {
        $data['title'] = 'Kirim Surat';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $data['unit'] = $this->Disposisi_model->getUnit1();

        $this->form_validation->set_rules('jabatan', 'Penerima', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Disposisi_model->tambahDisposisi1();
            $status = [
                'statuskirim' => 1
            ];
            $this->db->where('id_suratmasuk', $id_suratmasuk);
            $this->db->update('tb_surat_masuk', $status);
            redirect('Suratmasuk');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('disposisi/tambahdisposisi1', $data);
            $this->load->view('templates/footer');
        }
    }

    public function kembalikanDisposisi($id_disposisi)
    {
        $data['title'] = 'Kembalikan Disposisi Surat?';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $jabatan = $this->User_model->GetJabatanUser();
        $data['disposisi'] = $this->Disposisi_model->getDisposisiById($id_disposisi);

        $this->Disposisi_model->kembalikanDisposisi($id_disposisi, $jabatan);
        redirect('disposisi/suratmasukpengguna');
    }

    public function hapusDisposisi($id_disposisi)
    {
        $data['disposisi'] = $this->Disposisi_model->getDisposisiById($id_disposisi);

        $this->Disposisi_model->hapusDisposisi($id_disposisi);
        redirect('disposisi/suratmasukpengguna');
    }

    //request jabatan berdasarkan id_sub_unit yang dipilih
    function add_ajax_jabatan($id_unit)
    {
        $query = $this->db->get_where('tb_jabatan', array('id_unit' => $id_unit));
        $data = "<option value=''> - Pilih Jabatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_jabatan . "'>" . $value->nama_jabatan . "</option>";
        }
        echo $data;
    }

    public function tracking($id_suratmasuk)
    {
        $data['title'] = 'Tracking Posisi Surat';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        // $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $data['disposisi'] = $this->Disposisi_model->disposisiSurat($id_suratmasuk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('disposisi/tracking', $data);
        $this->load->view('templates/footer');
    }

    public function suratmasukpengguna()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['disposisi'] = $this->Disposisi_model->smPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/smpengguna', $data);
        $this->load->view('templates/footer');
    }
}
