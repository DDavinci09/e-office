<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function getAllUnit()
    {
        return $this->db->get('tb_unit')->result_array();
    }
    
    public function getAllUnit1()
    {
        $this->db->where('tb_unit.nama_unit' !== 'Administrator');
        return $this->db->get('tb_unit')->result_array();
    }
    
    public function getAllJabatan2($id_unit)
    {
        $this->db->join('tb_unit', 'tb_unit.id_unit = tb_jabatan.id_unit');
        $this->db->where('tb_jabatan.id_unit', $id_unit);
        return $this->db->get('tb_jabatan')->result_array();
    }

    public function getAllJabatan3()
    {
        return $this->db->query("SELECT * FROM tb_jabatan  WHERE tb_jabatan.nama_jabatan != 'Resepsionis'")->result_array();
    }

    public function namaJabatan()
    {
        return $this->db->get('tb_jabatan')->result_array();
    }

    public function getUnitId($id_unit)
    {
        return $this->db->get_where('tb_unit', ['id_unit' => $id_unit])->row_array();
    }

    public function tambahUnit()
    {
        $data = [
            "nama_unit" => $this->input->post('nama_unit', true)
        ];

        $this->db->insert('tb_unit', $data);
    }

    public function tambahJabatan()
    {
        $data = [
            "id_unit" => $this->input->post('id_unit', true),
            "id_sub_unit" => $this->input->post('id_sub_unit', true),
            "nama_jabatan" => $this->input->post('nama_jabatan', true)
        ];

        $this->db->insert('tb_jabatan', $data);
    }
    
    public function tambahJabatan2()
    {
        $data = [
            "id_unit" => $this->input->post('id_unit', true),
            "nama_jabatan" => $this->input->post('nama_jabatan', true)
        ];

        $this->db->insert('tb_jabatan', $data);
    }
    
}
