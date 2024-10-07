<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index($id_suratmasuk)
    {
        $data['suratmasuk'] = $this->SuratMasuk_model->getSuratMasukById($id_suratmasuk);
        $data['disposisi'] = $this->Disposisi_model->disposisiSurat($id_suratmasuk);
        // $data['disposisi'] = $this->db->query("SELECT * FROM tb_disposisi join tb_surat_masuk on tb_surat_masuk.id_suratmasuk = tb_disposisi.id_suratmasuk join tb_jabatan on tb_jabatan.id_jabatan = tb_disposisi.id_tujuan  WHERE tb_disposisi.pengirim != 'Resepsionis' AND tb_surat_masuk.id_suratmasuk = '$id_suratmasuk'")->result_array();
        $data['rektor'] = $this->Disposisi_model->catatanRektor($id_suratmasuk);
        $data['tujuan'] = $this->Disposisi_model->disposisiSurat1($id_suratmasuk);

        $this->load->library('mypdf');
        $this->mypdf->generate('laporan/laporan_disposisi', $data);
    }

    public function suratmasuk()
    {
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukLaporan();
        
        $data['ttd'] = $this->User_model->getTtd();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/laporan_semuasuratmasuk', $data);
    }
    
    public function laporansuratmasuk()
    {
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukLaporan();
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['suratmasuk'] = $this->SuratMasuk_model->tanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['totalsurat'] = $this->SuratMasuk_model->totaltanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;
        $data['ttd'] = $this->User_model->getTtd();
        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/laporan_suratmasuk', $data);
    }
}
