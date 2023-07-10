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
}
