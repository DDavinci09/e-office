<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signature_model extends CI_Model {

	Public function insert_signature($image)
	{
		$check=$this->get_signs();
		if($check==0)
		{
			$data=array(
				'name'=>$this->input->post('signname'),
				'id_user'=>$user['id_user'],
				'img'=>$image,
				'rowno'=>$this->input->post('rowno'),
				'append'=>$this->input->post('appendcount')
				);

			$this->db->insert('signature', $data);
		}
		else
		{
			$data=array(
				'name'=>$this->input->post('signname'),
				'id_user'=>$this->input->post('id_user'),
				'img'=>$image,		
				);
			$this->db
				->where('rowno',$this->input->post('rowno'))
				->where('append',$this->input->post('appendcount'))
				->update('signature', $data);
		}

		return ($this->db->affected_rows()!=1)?false:true;
	}

	Public function insert_single_signature($image, $user)
	{
		$check=$this->get_single_signs();
		if($check==0)
		{
			$data=array(			
				'img'=>$image,	
				'id_user' => $user['id_user'],
				'rowno'=>$this->input->post('rowno')		
				);

			$this->db->insert('signature', $data);
		}
		else
		{
			$data=array(
				'img'=>$image
			);

			$this->db
				->where('rowno',$this->input->post('rowno'))		
				->update('signature', $data);
		}

		return ($this->db->affected_rows()!=1)?false:true;
	}


	public function get_signs()
	{
		$datas=array(
				'rowno'=>$this->input->post('rowno'),
				'append'=>$this->input->post('appendcount')
			);

		return $this->db->get_where('signature',$datas)->num_rows();
	}

	public function get_single_signs()
	{
		$datas=array(
				'rowno'=>$this->input->post('rowno')			
			);

		return $this->db->get_where('signature',$datas)->num_rows();
	}

	public function hapusSignature($id)
    {
        $this->db->delete('signature', ['id' => $id]);
    }

}