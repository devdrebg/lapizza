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

}