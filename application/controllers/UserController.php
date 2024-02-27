<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {



	
	public function index()
	{
		$this->load->view('login');
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
        		$response['errors'] = $this->form_validation->error_array();
        } else {
			$this->load->model('UserModel');

            $username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			 // Check if the email is already registered
			 if ($this->UserModel->isEmailRegistered($email)) {
				$response['status'] = 'error';
				$response['message'] = 'Email is already registered.';
			} 
			else{
			$data =array("username"=>$username,"password"=>$password,"email"=>$email);
			
			
			if ($this->UserModel->insertuser($data)) {

            // Registration successful
            $response['status'] = 'success';
            $response['message'] = 'Registration successful!';
			// redirect(base_url());

        } 
			else {
            // Registration failed
            $response['status'] = 'error';
            $response['message'] = 'Registration failed.';
        }
        }
	}
		  // Send JSON response
		  $this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode($response));
  }
		
	}

