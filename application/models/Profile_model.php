<?php

class Profile_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public $name;
	public $email;
	public $phone;
	public $address;

	public function getProfiles()
	{
		$query = $this->db->get('profiles');

		return $query->result_array();
	}
}
