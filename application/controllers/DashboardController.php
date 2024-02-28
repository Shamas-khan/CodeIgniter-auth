<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if the user is already logged in
        if (!($this->session->userdata('user_id'))) {
            redirect(base_url());
        }

        $this->load->model('UserModel');
    }
    public function index()
    {
        $userData = array(
            'user_id' => $this->session->userdata('user_id'),
            'user_name' => $this->session->userdata('user_name'),
            'user_email' => $this->session->userdata('user_email'),
        );

        $this->load->view('dashboard', array('userData' => $userData));
    }

}
