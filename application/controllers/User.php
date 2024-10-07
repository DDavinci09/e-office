<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ttd'] = $this->User_model->getTtdUser();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        $data['unit'] = $this->User_model->GetUnitUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function updateUser()
    {
        $data['title'] = 'Update Profile';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ttd'] = $this->User_model->getTtdUser();
        $data['jabatan'] = $this->User_model->GetJabatanUser();
        $data['unit'] = $this->Disposisi_model->getUnit1();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->User_model->updateuser();
            redirect('user');
        } else {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/update', $data);
        $this->load->view('templates/footer');
        }
    }

    
}
