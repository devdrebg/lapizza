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

    function getCategory($id_categorie) {
        $this->db->select('name');
        $this->db->from('categories');
        $this->db->where('id', $id_categorie);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function update($data) {
        $this->db->where('id', $data['id']);
        $this->db->set('id_categorie', $data['id_categorie']);
        $this->db->set('name', $data['name']);
        $this->db->set('description', $data['description']);
        $this->db->set('price', $data['price']);
        $this->db->set('image', $data['image']);
        $this->db->set('quantity', $data['quantity']);
        $query = $this->db->update('products', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function updateQuantity($id, $quantity) {
        $this->db->where('id', $id);
        $this->db->set('quantity', $quantity);
        $query = $this->db->update('products');
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

    function getAllRelated($id, $id_categorie) {       
        $this->db->select('*');
        $this->db->where('id !=', $id);
        $this->db->where('id_categorie', $id_categorie);
        $this->db->order_by('rand()');
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function getAllWhereIdCategorie($id) {       
        $this->db->select('*');
        $this->db->where('id_categorie', $id);
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function getAll() {
        $listaProdutos = array();
        $this->db->select('products.*, categories.name as categorie');
        $this->db->join('categories', 'products.id_categorie = categories.id');
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function getAllActive() {
        $query = $this->db->where('status', '1');
        $this->db->order_by('rand()');
        $this->db->limit(12);
        $query = $this->db->get('products');
        return $query->result_array();
    }

}