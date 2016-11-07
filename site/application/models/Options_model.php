<?php 

class Options_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->select('id, tax_vat, store_status');
        $this->db->from('options');
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
        $this->db->set('tax_vat', $data['tax_vat']);
        $this->db->set('store_status', $data['store_status']);
        $query = $this->db->update('options', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getAll() {
    	$query = $this->db->get('options');
        return $query->result_array();
    }

}