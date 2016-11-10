<?php 

class Postalcodes_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('postalcodes', $data);

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get($cep) {
        $this->db->select('cep');
        $this->db->from('postalcodes');
        $this->db->where('cep', $cep);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('postalcodes'); 

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getAll() {
    	$query = $this->db->get('postalcodes');
        return $query->result_array();
    }

}