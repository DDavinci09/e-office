<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    public function getAllDisposisi()
    {
        return $this->db->get_where('tb_disposisi', 'status' == '1')->result_array();
    }

    public function getDisposisiById($id_disposisi)
    {
        return $this->db->get_where('tb_disposisi', ['id_disposisi' => $id_disposisi])->row_array();
    }

    public function editStatusDisposisi()
    {
        $data = [
            "status_disposisi" => 1,
        ];

        $this->db->where('id_disposisi', $this->input->post('id_disposisi'));

        $this->db->update('tb_disposisi', $data);
    }
    
    public function kembalikanDisposisi($id_disposisi, $jabatan)
    {
        $data = [
            "status_disposisi" => 0,
            "dikembalikan" => $jabatan['nama_jabatan']
        ];

        $this->db->where('id_disposisi', $id_disposisi);

        $this->db->update('tb_disposisi', $data);
    }

    public function hapusDisposisi($id_disposisi)
    {
        $this->db->delete('tb_disposisi', ['id_disposisi' => $id_disposisi]);
    }

    public function tambahDisposisi()
    {
        $data = [
            "id_suratmasuk" => $this->input->post('id_suratmasuk', true),
            "pengirim" => $this->input->post('pengirim', true),
            "id_tujuan" => $this->input->post('jabatan', true),
            "keterangan" => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_disposisi', $data);
    }
    
    public function tambahDisposisi1()
    {
        $data = [
            "id_suratmasuk" => $this->input->post('id_suratmasuk', true),
            "pengirim" => $this->input->post('pengirim', true),
            "id_tujuan" => $this->input->post('jabatan', true)
        ];

        $this->db->insert('tb_disposisi', $data);
    }

    public function disposisiSurat1($id_suratmasuk)
    {
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where('tb_surat_masuk.id_suratmasuk', $id_suratmasuk and ['pengirim' !== 'Resepsionis']);
        // $this->db->where('tb_disposisi.pengirim',);
        return $this->db->get('tb_disposisi')->result_array();
    }

    public function disposisiSurat($id_suratmasuk)
    {
        return $this->db->query("SELECT * FROM tb_disposisi join tb_surat_masuk on tb_surat_masuk.id_suratmasuk = tb_disposisi.id_suratmasuk join tb_jabatan on tb_jabatan.id_jabatan = tb_disposisi.id_tujuan  WHERE tb_disposisi.pengirim != 'Resepsionis' AND tb_surat_masuk.id_suratmasuk = '$id_suratmasuk'")->result_array();
    }

    public function smPengguna()
    {
        $this->db->join('tb_disposisi', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->where(['tb_disposisi.status_disposisi' => 0]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get_where('tb_surat_masuk', ['status' => 0])->result_array();
    }
    
    public function smPengguna2()
    {
        $this->db->join('tb_disposisi', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_disposisi.id_tujuan' => $this->session->userdata('id_jabatan')]);
        $this->db->where(['tb_disposisi.status_disposisi' => 0]);
        $this->db->group_by('tb_surat_masuk.id_suratmasuk');
        $this->db->order_by('id_disposisi', 'DESC');
        return $this->db->get_where('tb_surat_masuk', ['status' => 0])->num_rows();
    }

    public function getUnit()
    {
        return $this->db->get('tb_unit')->result_array();
    }
    
    public function getUnit1()
    {
        return $this->db->query("SELECT * FROM tb_unit  WHERE tb_unit.nama_unit != 'Administrator'")->result_array();
    }

    public function catatanRektor($id_suratmasuk)
    {
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where('tb_surat_masuk.id_suratmasuk', $id_suratmasuk);
        return $this->db->get_where('tb_disposisi', ['pengirim' => 'Rektor'])->row_array();
    }
    
    public function disposisiRektor($id_suratmasuk)
    {
        $this->db->join('tb_surat_masuk', 'tb_disposisi.id_suratmasuk = tb_surat_masuk.id_suratmasuk');
        $this->db->join('tb_jabatan', 'tb_disposisi.id_tujuan = tb_jabatan.id_jabatan');
        $this->db->where('tb_surat_masuk.id_suratmasuk', $id_suratmasuk);
        return $this->db->get_where('tb_disposisi', ['pengirim' => 'Rektor'])->row_array();
    }

    public function terdisposisi($id_disposisi)
    {
        $data = [
            "status" => 1
        ];

        $this->db->where('id_disposisi', $id_disposisi);
        $this->db->update('tb_disposisi', $data);
    }
}
