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
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/home');
		$this->load->view('public/footer');
	}

	public function about() {
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/about');
		$this->load->view('public/footer');
	}

	public function login() {
		$this->load->helper('form');
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/login');
		$this->load->view('public/footer');
	}

	public function howworks() {
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/howworks');
		$this->load->view('public/footer');
	}

	public function contactus() {
		$this->load->helper('form');
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/contactus');
		$this->load->view('public/footer');
	}

	public function adminlogin() {
		$this->load->helper('form');
		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->view('public/header', $data);
		$this->load->view('public/adminlogin');
		$this->load->view('public/footer');		
	}

}
