<?php 

class Products_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($data) {
    	$this->db->insert('products', $data);

    	if($this->db->affected_rows() > 0) {
    		return true;
    	} else {
			return false;
		}
    }

    function get($id) {
        $this->db->select('id, id_categorie, name, description, price, image, quantity');
        $this->db->from('products');
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
        $this->db->set('name', $data['name']);
        $query = $this->db->update('products', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('products'); 

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getAll() {
    	$query = $this->db->get('products');

        return $query->result_array();
    }

}