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
		$data['categories'] = $this->categories_model->getAll();
		$this->template->set('categories', $data['categories']);
		$this->template->load('layouts/admin', 'admin/categories');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

