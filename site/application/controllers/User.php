<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userLogged();
	}

	public function index() {
		$data['title'] = 'Dashboard';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('user/header', $data);
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}

	public function address() {
		$this->load->model('address_model');
		$userData = $this->session->userdata();

		$data['userdata'] = $userData;
		$data['addresses'] = $this->address_model->getAllFromUser($userData['id']);
		
		$data['title'] = 'Meus Endereços';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('user/header', $data);
		$this->load->view('user/address');
		$this->load->view('user/footer');
	}

	private function userLogged() {
		if(!$this->session->userdata('validated')){
			redirect('login');
		}
	}

}

