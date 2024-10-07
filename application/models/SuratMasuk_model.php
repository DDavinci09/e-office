<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk_model extends CI_Model
{
    public function getAllSuratMasuk()
    {
        $this->db->order_by('id_suratmasuk', 'DESC');
        return $this->db->get_where('tb_surat_masuk', ['status' => 0])->result_array();
    }

    public function getAllSuratMasukLaporan()
    {
        return $this->db->get('tb_surat_masuk')->result_array();
    }
    
    public function getAllSuratMasukLaporan2($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->db->like('dari', $keyword);
            $this->db->or_like('no_surat', $keyword);
            $this->db->or_like('perihal', $keyword);
        }
        $this->db->order_by('id_suratmasuk', 'DESC');
        return $this->db->get('tb_surat_masuk', $limit, $start)->result_array();
    }

    public function getAllSuratMasukDisposisi($limit, $start)
    {
        $this->db->order_by('id_suratmasuk', 'DESC');
        return $this->db->get('tb_surat_masuk', $limit, $start)->result_array();
    }
    
    public function getAllSuratMasukDisposisi1()
    {
        return $this->db->get('tb_surat_masuk')->num_rows();
    }

    public function getDispoisiSuratmasukPengguna()
    {
        // return $this->db->get('tb_surat_masuk')->result_array();
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get('tb_disposisi')->result_array();
    }
    
    public function gettotalDispoisiSuratmasukPengguna()
    {
        // return $this->db->get('tb_surat_masuk')->result_array();
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        return $this->db->get('tb_disposisi')->num_rows();
    }

    public function getArsipSuratmasukPengguna()
    {
        // return $this->db->get('tb_surat_masuk')->result_array();
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan'), 'tb_surat_masuk.status' => 1]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get('tb_disposisi')->result_array();
    }
    
    public function gettotalArsipSuratmasukPengguna()
    {
        // return $this->db->get('tb_surat_masuk')->result_array();
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan'), 'tb_surat_masuk.status' => 1]);
        return $this->db->get('tb_disposisi')->num_rows();
    }
    
    public function getArsipSuratmasukPengguna2()
    {
        // return $this->db->get('tb_surat_masuk')->result_array();
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan'), 'tb_surat_masuk.status' => 1]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        return $this->db->get('tb_disposisi')->num_rows();
    }

    public function getArsip($limit, $start)
    {
        $this->db->order_by('id_suratmasuk', 'DESC');
        return $this->db->get_where('tb_surat_masuk', ['status' => 1], $limit, $start)->result_array();
    }
    
    public function gettotalArsip()
    {
        return $this->db->get_where('tb_surat_masuk', ['status' => 1])->num_rows();
    }

    public function tambahSuratMasuk($file)
    {
        $data = [
            "no_surat" => $this->input->post('no_surat', true),
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "lampiran" => $this->input->post('lampiran', true),
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "no_agenda" => $this->input->post('no_agenda', true),
            "dari" => $this->input->post('dari', true),
            "kepada" => $this->input->post('kepada', true),
            "perihal" => $this->input->post('perihal', true),
            "status_surat" => $this->input->post('status_surat', true),
            "prioritas_surat" => $this->input->post('prioritas_surat', true),
            "sifat_surat" => $this->input->post('sifat_surat', true),
            "file" => $file['file_name']
        ];

        $this->db->insert('tb_surat_masuk', $data);
    }

    public function editSuratMasuk()
    {
        $data = [
            "no_surat" => $this->input->post('no_surat', true),
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "lampiran" => $this->input->post('lampiran', true),
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "no_agenda" => $this->input->post('no_agenda', true),
            "dari" => $this->input->post('dari', true),
            "kepada" => $this->input->post('kepada', true),
            "perihal" => $this->input->post('perihal', true),
            "status_surat" => $this->input->post('status_surat', true),
            "prioritas_surat" => $this->input->post('prioritas_surat', true),
            "sifat_surat" => $this->input->post('sifat_surat', true)
        ];

        $this->db->where('id_suratmasuk', $this->input->post('id_suratmasuk'));
        // id berdasar input hidden pada view ubah data

        $this->db->update('tb_surat_masuk', $data);
    }

    public function editSuratMasukFile($file)
    {

        $data = [
            "no_surat" => $this->input->post('no_surat', true),
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "lampiran" => $this->input->post('lampiran', true),
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "no_agenda" => $this->input->post('no_agenda', true),
            "dari" => $this->input->post('dari', true),
            "kepada" => $this->input->post('kepada', true),
            "perihal" => $this->input->post('perihal', true),
            "status_surat" => $this->input->post('status_surat', true),
            "prioritas_surat" => $this->input->post('prioritas_surat', true),
            "sifat_surat" => $this->input->post('sifat_surat', true),
            "file" => $file['file_name']
        ];

        $this->db->where('id_suratmasuk', $this->input->post('id_suratmasuk'));
        // id berdasar input hidden pada view ubah data

        $this->db->update('tb_surat_masuk', $data);
    }

    public function getSuratMasukById($id_suratmasuk)
    {
        return $this->db->get_where('tb_surat_masuk', ['id_suratmasuk' => $id_suratmasuk])->row_array();
    }

    public function hapusSuratMasuk($id_suratmasuk)
    {
        $this->db->delete('tb_surat_masuk', ['id_suratmasuk' => $id_suratmasuk]);
    }

    public function arsipsurat($id_suratmasuk, $jabatan)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            "status" => 1,
            "pengarsip" => $jabatan['nama_jabatan'],
            "tgl_arsip" => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_suratmasuk', $id_suratmasuk);
        $this->db->update('tb_surat_masuk', $data);
    }

    public function petunjuk($id_suratmasuk)
    {
        $data = [
            "petunjuk" => $this->input->post('petunjuk', true)
        ];

        $this->db->where('id_suratmasuk', $id_suratmasuk);
        $this->db->update('tb_surat_masuk', $data);
    }

    public function getsuratpertanggal($mulai_tanggal, $sampai_tanggal)
    {
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE tgl_surat BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");

        return $query->result();
    }

    public function carisurat($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_surat_masuk');
        $this->db->like('dari', $keyword);
        return $this->db->get()->result_array();
    }
    
    public function carisurat2($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_surat_masuk');
        $this->db->like('dari', $keyword);
        return $this->db->get()->num_rows();
    }

    public function tanggalsurat($mulai_tanggal, $sampai_tanggal)
    {
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE tgl_surat BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");

        return $query->result_array();
    }

    public function totaltanggalsurat($mulai_tanggal, $sampai_tanggal)
    {
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE tgl_surat BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");

        return $query->num_rows();
    }

    public function jumlahsuratbaru()
    {
        return $this->db->get_where('tb_surat_masuk', ['status' => 0])->num_rows();
    }

    public function totalsuratmasuk()
    {
        return $this->db->get_where('tb_surat_masuk')->num_rows();
    }
    
    public function suratmasukdalamdisposisi()
    {
        $this->db->where(['statuskirim' => 1]);
        $this->db->where(['status' => 0]);
        return $this->db->get_where('tb_surat_masuk')->num_rows();
    }

    public function suratmasukdalamdisposisiPengguna()
    {
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->where(['tb_surat_masuk.statuskirim' => 1]);
        $this->db->where(['tb_surat_masuk.status' => 0]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get('tb_disposisi')->num_rows();
    }
    
    public function totalsuratmasukPengguna()
    {
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get('tb_disposisi')->num_rows();
    }
    
    public function totalsuratmasuk2($limit, $start)
    {
        return $this->db->get_where('tb_surat_masuk', $limit, $start)->num_rows();
    }

    public function jumlaharsipsurat()
    {
        return $this->db->get_where('tb_surat_masuk', ['status' => 1])->num_rows();
    }
}
