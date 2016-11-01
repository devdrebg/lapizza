<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function categories() {
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();
		
		
		$this->load->view('admin/header');
		$this->load->view('admin/categories', $data);
		$this->load->view('admin/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

