<?php 

class Banners_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($data) {
    	$this->db->insert('banners', $data);

    	if($this->db->affected_rows() > 0) {
    		return true;
    	} else {
			return false;
		}
    }

    function get($id) {
        $this->db->select('id, title, url, link, blank, status');
        $this->db->from('banners');
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
        $this->db->set('title', $data['title']);
        $this->db->set('url', $data['url']);
        $this->db->set('link', $data['link']);
        $this->db->set('blank', $data['blank']);
        $this->db->set('status', $data['status']);
        $query = $this->db->update('banners', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('banners'); 

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getAll() {
        $this->db->select('*');
        $query = $this->db->get('banners');  

        return $query->result_array();
    }

    function getAllActive() {
        $query = $this->db->where('status', '1');
        $query = $this->db->get('banners');
        return $query->result_array();
    }

}