<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
	public function index()
	{
		$this->load->model('Profile_model');

		$profiles = $this->Profile_model->get();

		$data['profiles'] = $profiles;
		$this->load->view('profile/list', $data);
	}

	public function detail($id)
	{
		$this->load->model('Profile_model');

		$profile = $this->Profile_model->findById($id);

		$data['profile'] = $profile;
		$this->load->view('profile/detail', $data);
	}

	public function create()
	{
		if ($this->input->post()) {
			// validate
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			if ($this->form_validation->run() == FALSE) {
				// send error
				$data['validation_errors'] = validation_errors();
				$this->load->view('profile/create', $data);
			} else {
				// save to model
				$this->load->model('Profile_model');
				$profile = $this->Profile_model;
				$profile->create();

				// if error
				if ($this->db->error()) {
					$error = $this->db->error();
					echo "Database Error: " . $error['message'];
				}

				// redirect
				redirect('profile');
			}
		} else {
			$this->load->view('profile/create');
		}
	}

	public function update($id)
	{
		$this->load->model('Profile_model');

		if ($this->input->post()) {
			// validate
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			if ($this->form_validation->run() == FALSE) {
				// send error
				$data['validation_errors'] = validation_errors();
				$data['profile'] = $this->Profile_model->findById($id);
				$this->load->view('profile/update', $data);
			} else {
				// update data in model
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
				);
				$this->Profile_model->update($id, $data);
				if ($this->db->error()) {
					$error = $this->db->error();
					echo "Database Error: " . $error['message'];
				}
				redirect('profile/detail/' . $id);
			}
		} else {
			// load profile data for update form
			$data['profile'] = $this->Profile_model->findById($id);
			$this->load->view('profile/update', $data);
		}
	}


	public function delete($id)
	{
		$this->load->model('Profile_model');

		$profile = $this->Profile_model->findById($id);

		$data['profile'] = $profile;
		$this->load->view('profile/update', $data);
	}
}
