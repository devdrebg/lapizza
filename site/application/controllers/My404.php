<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

	public function index() {
		$data['title'] = 'Erro 404';

		$this->load->model('categories_model');
		$data['categories'] = $this->categories_model->getAll();

		$this->load->model('banners_model');
		$data['banners'] = $this->banners_model->getAllActive();

		$this->load->view('public/header', $data);
		$this->load->view('public/404');
		$this->load->view('public/footer');
	}
}