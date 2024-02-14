<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models and libraries here
        // For example: $this->load->model('dashboard_model');
    }

    public function index() {
        // Check if user is logged in, if not redirect to login page
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    
        // Get user data from session
        $user_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'username' => $this->session->userdata('username')
        );
    
        // Load dashboard view and pass user data to it
        $this->load->view('dashboard', $user_data);
    }
    
}
?>
