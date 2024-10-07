<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signature extends CI_Controller {


	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Tanda Tangan Digital';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('signature/index', $data);
		$this->load->view('templates/footer');
	}

	Public function insert_single_signature()
	{
	$user = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = './assets/signature-image/' . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	$image=str_replace('./','',$file);

    $this->Signature_model->insert_single_signature($image, $user);
	 echo '<img src="'.base_url().$image.'">';
	}

	public function multiple()
	{	
			$this->load->view('header');
		    $this->load->view('multiple_sign');
	}

	Public function get_multiple()
	{
	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$image=uniqid() . '.png';
	$file = './signature-image/' .$image;
	$success = file_put_contents($file, $data);
		

	$this->Signature_model->insert_signature($image);
	 echo '<img src="'.base_url().'signature-image/'.$image.'">';

	}

	public function hapus($id)
    {
        $this->Signature_model->hapusSignature($id);

        redirect('User');
    }
}
