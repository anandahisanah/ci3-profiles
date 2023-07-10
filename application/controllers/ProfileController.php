<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
	public function index()
	{
		$this->load->model('Profile_model');

		$profiles = $this->Profile_model->get();

		$data['profiles'] = $profiles;
		$this->load->view('profile/read', $data);
	}

	public function create()
	{
		if ($this->input->post()) {
			// // validate
			// $this->load->library('form_validation');
			// $this->form_validation->set_rules('name', 'Name', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			// $this->form_validation->set_rules('phone', 'Phone Number', 'required');
			// $this->form_validation->set_rules('address', 'Address', 'required');

			// if ($this->form_validation->run() == FALSE) {
			// 	// send error
			// 	$data['validation_errors'] = validation_errors();
			// 	$this->load->view('profile/create', $data);
			// } else {
			// 	// save to model
			// 	$this->load->model('Profile_model');
			// 	$profile = $this->Profile_model;
			// 	$profile->create();
			// 	redirect('profile/read');
			// }

			$this->load->model('Profile_model');

			if ($this->Profile_model->create()) {
				// Data berhasil disimpan
				redirect('profile/read');
			} else {
				// Terjadi kesalahan saat menyimpan data
				echo 'Terjadi kesalahan saat menyimpan data.';
			}
		} else {
			$this->load->view('profile/create');
		}
	}
}
