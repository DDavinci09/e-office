<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function hapusUser($id_user)
    {
        //$this->db->where('id', $id);
        $this->db->delete('tb_user', ['id_user' => $id_user]);
    }

    public function updateuser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }

    public function GetJabatanUser()
    {
        $this->db->join('tb_user', 'tb_user.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_user.id_jabatan' => $this->session->userdata('id_jabatan')]);
        return $this->db->get('tb_jabatan')->row_array();
    }
    
    public function GetUnitUser()
    {
        $this->db->join('tb_user', 'tb_user.id_unit = tb_unit.id_unit');
        $this->db->where(['tb_user.id_unit' => $this->session->userdata('id_unit')]);
        return $this->db->get('tb_unit')->row_array();
    }

    // Mendapatkan tanda tangan user tertentu
    public function getTtd()
    {
        $this->db->join('tb_user', 'signature.id_user = tb_user.id_user');
        $this->db->join('tb_jabatan', 'tb_user.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->where('tb_jabatan.nama_jabatan', 'KaSubBag TUHRT');
        return $this->db->get('signature')->row_array();
    }
    
    // Mendapatkan tanda tangan user
    public function getTtdUser()
    {
        $this->db->join('tb_user', 'signature.id_user = tb_user.id_user');
        $this->db->join('tb_jabatan', 'tb_user.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->where(['tb_jabatan.id_jabatan' => $this->session->userdata('id_jabatan')]);
        return $this->db->get('signature')->row_array();
    }
    
}
