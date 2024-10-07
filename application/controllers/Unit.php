<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Unit';
        $data['unit'] = $this->Unit_model->getAllUnit();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('unit/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function jabatan1($id_unit)
    {
        $data['title'] = 'Data Jabatan';
        $data['jabatan'] = $this->Unit_model->getAllJabatan2($id_unit);
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['unit'] = $this->Unit_model->getUnitId($id_unit);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('unit/jabatan1', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUnit()
    {
        $data['title'] = 'Tambah Unit';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->User_model->GetJabatanUser();

        $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Unit_model->tambahUnit();
            redirect('unit');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('unit/tambahUnit', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function tambahJabatan2($id_unit)
    {
        $data['title'] = 'Tambah jabatan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        $data['unit'] = $this->Unit_model->getUnitId($id_unit);

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Unit_model->tambahJabatan2();
            redirect('unit/jabatan1/' . $id_unit);
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('unit/tambahJabatan1', $data);
            $this->load->view('templates/footer');
        }
    }
}
