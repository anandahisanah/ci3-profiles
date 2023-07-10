<?php

class Profile_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		$query = $this->db->get('profiles');

		return $query->result_array();
	}

	public function findById($id)
	{
		$query = $this->db->get_where('profiles', array('id' => $id));
		return $query->row_array();
	}

	public function create()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
		);
		return $this->db->insert('profiles', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('profiles', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('profiles', array('id' => $id));
	}
}
