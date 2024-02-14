<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models and libraries here
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        // If user is already logged in, redirect to dashboard
        if($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        // Load login view
        $this->load->view('login');
    }

    public function login() {
        // Handle login form submission
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validate credentials
        $user = $this->user_model->login($username, $password);
        
        if($user) {
            // Set session data
            $user_data = array(
                'user_id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);
            
            // Redirect to dashboard
            redirect('dashboard');
        } else {
            // If login fails, show login form again with error message
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth');
        }
    }

    public function logout() {
        // Unset session data and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect('auth');
    }
}
?>
