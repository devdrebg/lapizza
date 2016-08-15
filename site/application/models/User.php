<?php 

class User extends CI_Model {

	public function __construct() {
            parent::__construct();
    }

    function redirect($email, $password) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('type', 0);
		$this->db->where('status', 1);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return $query->result_array();
		} else {
			return false;
		}
    }

    function logged() { 
		
	}

}