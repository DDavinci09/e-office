<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'e-Office Login Page';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['status'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // berhasil login
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                        'nama' => $user['nama'],
                        'nip' => $user['nip'],
                        'id_unit' => $user['id_unit'],
                        'id_jabatan' => $user['id_jabatan']
                    ];
                    $this->session->set_userdata($data);
                    // level pengguna berdasarkan level
                    if ($user['level'] == 1) {
                        redirect('admin');
                    } else if ($user['level'] != 1) {
                        redirect('admin/dashboard');
                    } else {
                    }
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                    redirect('auth');
                }
            } else {
                // username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This username is not been activated!
                </div>');
                redirect('auth');
            }
        } else {
            // username tidak terdatar terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!
            </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['unit'] = $this->Disposisi_model->getUnit();

        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'e-Office User Registration';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level', true),
                'status' => 1,
                'id_unit' => $this->input->post('unit', true),
                'id_jabatan' => $this->input->post('jabatan', true)
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('admin/daftaruser');
        }
    }


    public function logout()
    {
        session_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
        </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
