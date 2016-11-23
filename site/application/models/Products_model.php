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

    function getAllWhereIdCategorie($id) {       
        $this->db->select('*');
        $this->db->where('id_categorie', $id);
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function getAll() {
        $listaProdutos = array();
        $this->db->select('*');
        $query = $this->db->get('products');

        foreach ($query->result_array() as $row) {

            $listaProdutos[$row['id']]['id'] = $row['id'];
            $listaProdutos[$row['id']]['id_categorie'] = $row['id_categorie'];

            
            $this->db->select('name');
            $this->db->from('categories');
            $this->db->where('id', $row['id_categorie']);
            $categorie = $this->db->get();
            $listaProdutos[$row['id']]['categorie'] = $categorie->result_array()[0]['name'];
            

            $listaProdutos[$row['id']]['name'] = $row['name'];
            $listaProdutos[$row['id']]['description'] = $row['description'];
            $listaProdutos[$row['id']]['price'] = $row['price'];
            $listaProdutos[$row['id']]['image'] = $row['image'];
            $listaProdutos[$row['id']]['quantity'] = $row['quantity'];
            $listaProdutos[$row['id']]['status'] = $row['status'];
        }     

        return $listaProdutos;
    }

}