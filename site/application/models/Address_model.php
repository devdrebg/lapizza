<?php 

class Address_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('address', $data);

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get($id) {
        $this->db->select('*');
        $this->db->from('address');
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
        $this->db->set('address', $data['address']);
        $this->db->set('number', $data['number']);
        $this->db->set('adjunct', $data['adjunct']);
        $this->db->set('district', $data['district']);
        $this->db->set('city', $data['city']);
        $this->db->set('state', $data['state']);
        $this->db->set('postalcode', $data['postalcode']);
        $this->db->set('name', $data['name']);
        $query = $this->db->update('address', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('address'); 

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getAllFromUser($idUser) {
        $this->db->select('*');
        $this->db->from('address');
        $this->db->where('id_user', $idUser);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}