<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$this->template->load('layouts/admin', 'admin/dashboard');
	}

	public function categories() {
		$this->load->model('categories_model');
		$data = array();
		$data['categories'] = $this->categories_model->getAll();
		$this->load->view('admin/categories', $data);
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

