<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
	public function index()
	{
		$this->load->model('Profile_model');

		$profileData = $this->Profile_model->getProfiles();

		$data['profileData'] = $profileData;
		$this->load->view('profile/read', $data);
	}
}
