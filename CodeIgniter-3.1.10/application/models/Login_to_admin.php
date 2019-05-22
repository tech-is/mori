<?php
class Login_to_admin_model extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function login_to_admin()
    {
        $this->db->select('id, name, body');
    }
}
