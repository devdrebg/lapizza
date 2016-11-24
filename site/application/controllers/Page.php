<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index() {
		$data['title'] = 'Pizzas, Esfihas e Lanches na Zona Leste';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/home');
		$this->load->view('public/footer');
	}

	public function about() {
		$data['title'] = 'Sobre';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/about');
		$this->load->view('public/footer');
	}

	public function login() {
		$this->load->helper('form');
		$data['title'] = 'Acessar Conta';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/login');
		$this->load->view('public/footer');
	}

	public function howworks() {
		$data['title'] = 'Como Funciona';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/howworks');
		$this->load->view('public/footer');
	}

	public function contactus() {
		$this->load->helper('form');
		$data['title'] = 'Fale Conosco';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/contactus');
		$this->load->view('public/footer');
	}
	
	public function adminlogin() {
		$this->load->helper('form');
		$data['title'] = 'Fale Conosco';

		$this->load->view('admin/header', $data);
		$this->load->view('public/adminlogin');
		$this->load->view('admin/footer');		
	}

}
