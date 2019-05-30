<?php
class Model_member extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function login()
    {
        $this->db->where("mail", $this->input->post("mail"));
        $this->db->select("name, password");
        $query = $this->db->get('member');
        if($query->num_rows() == 1){
            return $query->result('array');
		}else{
			return false;
		}
    }
}
