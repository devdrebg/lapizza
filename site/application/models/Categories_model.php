<?php 

class Categories_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($data) {
    	$this->db->insert('categories', $data);

    	if($this->db->affected_rows() > 0) {
    		return true;
    	} else {
			return false;
		}
    }

    function getAll() {
    	$query = $this->db->get('categories');
        return $query->result_array();
    }

}