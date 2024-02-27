<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');

	}



	public function index()
	{
		if ($this->input->post()) {

			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response['status'] = 'error';
				$response['errors'] = $this->form_validation->error_array();
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$user = $this->UserModel->isEmailRegistered($email);
				if ($user) {
					if (password_verify($password, $user['password'])) {
						// Login successful
						$response['status'] = 'success';
						$response['message'] = 'Login successful!';
						$this->session->set_userdata('user_id', $user['id']);
    					$this->session->set_userdata('user_name', $user['username']); 
    					$this->session->set_userdata('user_email', $user['email']); 
						
					} else {
						// Invalid email or password
						$response['status'] = 'error';
						$response['message'] = 'Invalid email or password';
					}
				} else {
					$response['status'] = 'error';
					$response['message'] = 'User Not found';

				}
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));

		} else {

			$this->load->view('login');
		}

	}
	public function register()
	{
		$this->load->view('register');
	}


	public function userregister()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|alpha');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid input';
			$response['errors'] = $this->form_validation->error_array();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');

			// Check if the email is already registered
			if ($this->UserModel->isEmailRegistered($email)) {
				$response['status'] = 'error';
				$response['message'] = 'Email is already registered.';
			} else {
				$data = array("username" => $username, "password" => $password, "email" => $email);

				if ($this->UserModel->insertuser($data)) {
					$response['status'] = 'success';
					$response['message'] = 'Registration successful!';
				} else {
					$response['status'] = 'error';
					$response['message'] = 'Registration failed.';
				}
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


}

