<?php 

class User_model extends CI_Model {

	public function __construct() {
            parent::__construct();
    }

    function redirect($email, $password) {
		$this->db->select('id, name, user, email, picture, phone');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('type', 0);
		$this->db->where('status', 1);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return $query->first_row('array');
		} else {
			return false;
		}
    }

    function signin($data) {
    	$this->db->insert('users', $data);
    }

    function exists($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('type', 0);
        $this->db->where('status', 1);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function recoveryPassword($email) {
        $this->db->select('id, name, email, password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function changestatus($id, $status) {
    	$this->db->where('id', $id);
        $this->db->set('status', $status);
        $query = $this->db->update('users');

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function updatePassword($id, $newpassword) {
        $this->db->where('id', $id);
        $this->db->set('password', $newpassword);
        $query = $this->db->update('users');

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function editaccount($id, $data) {
        $this->db->where('id', $id);
        $this->db->set('user', $data['email']);
        $this->db->set('email', $data['email']);
        $this->db->set('phone', $data['phone']);
        $this->db->set('password', $data['password']);
        $this->db->set('picture', $data['picture']);
        $this->db->where('type', '0');
        $this->db->where('status', '1');
        $query = $this->db->update('users');

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function getPassword($id) {
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->where('type', '0');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get($id) {
    	$this->db->select('name, phone');
        $this->db->from('users');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function getAll() {
    	$this->db->select('*');
        $this->db->where('type', '0');
        $query = $this->db->get('users');

        return $query->result_array();
    }

}