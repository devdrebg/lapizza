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

    function get($id) {
        $this->db->select('id, cep, location, city, state');
        $this->db->from('postalcodes');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function update($data) {
        $this->db->where('id', $data['id']);
        $this->db->set('cep', $data['cep']);
        $this->db->set('location', $data['location']);
        $this->db->set('city', $data['city']);
        $this->db->set('state', $data['state']);
        $query = $this->db->update('postalcodes', $data);

        if($query) {
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