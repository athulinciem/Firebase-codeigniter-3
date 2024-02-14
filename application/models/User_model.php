<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database in constructor
        $this->load->database();
    }

    public function login($username, $password) {
        // Query database to validate user
        $query = $this->db->get_where('users', array('username' => $username, 'password' => md5($password)));
        return $query->row_array();
    }
}
?>
