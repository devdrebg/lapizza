<?php 

class Orders_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('orders', $data);

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getByTime($date) {
        $this->db->select('id');
        $this->db->from('orders');
        $this->db->where('date', $date);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get($id) {
        $this->db->select('id, id_user, subtotal_price, tax_vat, total_price, date, name_user, address_user, number_user, postal_code_user, phone_user, name_billing, message, status');
        $this->db->from('orders');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function getAllFromUser($id) {       
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $query = $this->db->get('orders');

        return $query->result_array();
    }

    function getAll() {
        $query = $this->db->get('orders');

        return $query->result_array();
    }

    function updateorderstatus($id, $newStatusOrder) {
        $this->db->where('id', $id);
        $this->db->set('status', $newStatusOrder);
        $query = $this->db->update('orders');

        if($query) {
            return true;
        } else {
            return false;
        }
    }
}