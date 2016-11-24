<?php 

class Itens_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('itens', $data);

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function updateStock($data) {
        $this->db->where('id', $data['id']);
        $this->db->set('quantity', $data['quantity']);
        $query = $this->db->update('products', $data);
    }

    function getAllFromOrderId($id) {
        $this->db->select('*');
        $this->db->where('id_order', $id);
        $query = $this->db->get('itens');

        return $query->result_array();
    }

}