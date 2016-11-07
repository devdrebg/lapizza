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

	public function products() {
		$this->load->model('categories_model');
		$this->load->model('products_model');

		$data['products'] = $this->products_model->getAll();
		$data['categories'] = $this->categories_model->getAll();

		// var_dump($data['products']);
		// exit();

		$this->load->view('admin/header');
		$this->load->view('admin/products', $data);
		$this->load->view('admin/footer');
	}

	public function billings() {
		$this->load->model('billings_model');
		$data['billings'] = $this->billings_model->getAll();		
		
		$this->load->view('admin/header');
		$this->load->view('admin/billings', $data);
		$this->load->view('admin/footer');
	}

	public function banners() {
		$this->load->model('banners_model');
		$data['banners'] = $this->banners_model->getAll();		
		
		$this->load->view('admin/header');
		$this->load->view('admin/banners', $data);
		$this->load->view('admin/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

