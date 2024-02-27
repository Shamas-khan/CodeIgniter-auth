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
            $username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$data =array("username"=>$username,"password"=>$password,"email"=>$email);
			
			$this->load->model('UserModel');
			$this->UserModel->insertuser($data);

            $response = array('status' => 'success', 'message' => 'Registration successful!');
        }
		  // Send JSON response
		  $this->output
		  ->set_content_type('application/json')
		  ->set_output(json_encode($response));
  }
		
	}

